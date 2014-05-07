<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\Tables;

use Almeida\UIKit\Collections\Tables\TableInterface;
use Almeida\UIKit\Collections\Collection;

use Almeida\UIKit\Collections\Feedback\FeedbackInterface;

use Almeida\UIKit\Utility\String;
use Illuminate\Http\Request;
use Almeida\UIKit\UIKit;

abstract class AbstractTable extends Collection implements TableInterface
{

	public $options = array();

	public $defaults = array(
		'showHeaders'     => true,      // Show <th> ?
		'primaryKey'      => 'id',
		'hiddenFields'    => array('id','parent_id','depth','child_rows'),
		'wrapperClass'    => '',
		'containerClass'  => 'table table-striped',
		'rowClass'        => 'even',
		'rowClassAlt'     => 'odd',
		'rowActionsClass' => 'row-actions',
		'fieldClass'      => '',
		'headerClass'     => '',
		'query'           => array(),   // $_GET key, value pairs
	);

	public $output = array(
		'table' => ""
	);

	public function __construct($options=array(), FeedbackInterface $feedback)
	{
		$this->options  = array_merge($this->defaults, $options);
		$this->Feedback = $feedback;
	}

	/**
	 * Render element/s from the output cache
	 *
	 * $table = UIKit::table($rows, $options=array())
	 * $table->render();
	 */
	public function render()
	{
		$args = func_get_args();

		if (empty($args)) {
			return parent::render('table');
		}
	}

	/**
	 * Table::make()
	 *
	 * Renders a HTML5 table
	 */
	public function make($data, $options=array())
	{
		// Options
		$this->options = array_merge($this->options, $options);
		$options       = $this->options;

		// Capture output
		$out  = [];

		// @todo - Raise an exception instead ?
		// Would make more send and could be handled more gracefully
		//
		// Have any records actually been passed through ?
		if (empty($data)) {
			return $this->hasNoData($options);
		}

		// If a 'id' key has been specified use that as the table#id
		$tableId = null;

		if (!empty($options['id'])) {
			$tableId = "id='{$options['id']}'";
		}

		$out[] = "<div class=\"{$options['wrapperClass']}\">";
		$out[] = "\t<table class='{$options['containerClass']}' {$tableId}>";

		// Render headers
		if (true == $options['showHeaders']) {
			$headers = $this->extractHeaders($data);

			$out[] = "\t\t<thead>\r\t\t\t<tr class=\"{$options['headerClass']}\">";
			$count = 1;

			/**
			 * Create the <th> tag
			 */
			foreach ($headers as $index => $header)
			{
				$class = $this->getHeaderClass($header, $count);
				$count++;

				// Apply sort links to header
				if (isset($options['sort'][$header])) {

					$sortBy = $options['sort'][$header];
					$label  = $header;

					$header = $this->applyHeaderSort($label, $sortBy);
				}

				$out[] = "\t\t\t\t<th class=\"{$class}\">{$header}</th>";
			}

			$out[] = "\t\t\t</tr>\r\t\t</thead>";
		}

		$out[] = "\t\t<tbody>";

		// Render rows
		foreach ($data as $index => $row)
		{
			$rowClass = ($index % 2 == 0) ? $options['rowClass'] : $options['rowClassAlt'];

			if (isset($row['id'])) {
				$out[] = "\t\t\t<tr class='{$rowClass}' id='{$row['id']}-{$row['id']}'>";
			} else {
				$out[] = "\t\t\t<tr class='{$rowClass}'>";
			}

			foreach ($row as $field => $value) {
				$indent = "";
				if ($field == 'Title' && isset($options['type']) && $options['type'] == 'table-tree') {
					if (!empty($row['parent_id'])) {
						$indent = str_repeat($options['indent_style'], $row['depth']);
					}
				}

				if (in_array($field, $options['hiddenFields'], true)) {
					continue;
				}

				$fieldClass = $options['fieldClass'];

				if (is_array($value)) {
					//Log::info('@todo - Replace with logging interface');
					//$value = implode(',' $value);
					$value = 'Array';
				}

				$out[] = "\t\t\t\t<td class=\"{$fieldClass}\">{$value}</td>";

			}

			$out[] = "\t\t\t</tr>";
		}

		$out[] = "\t\t</tbody>";
		$out[] = "\t</table>";
		$out[] = "</div>";

		$this->output['table'] = implode(PHP_EOL, $out);

		return $this;
	}


	/**
	 * Render the a Feedback block
	 *
	 * Feedback::noData($options);
	 *
	 * @param  array   $options [description]
	 * @return boolean          [description]
	 */
	public function hasNoData($options=array())
	{
		$this->output['table'] = $this->Feedback->noData($options);

		return $this;
	}

	/**
	 * Get Table headers from data
	 */
	protected function extractHeaders($data)
	{
		$headers = array_keys($data[0]);

		// Remove hidden fields from headers if supplied
		foreach ($this->options['hiddenFields'] as $hiddenField) {
			if (in_array($hiddenField, $headers)) {
				array_splice($headers, array_search($hiddenField, $headers), 1);
			}
		}

		if (!empty($this->options['actions'])) {
			$headers[] = 'Actions';
		}

		return $headers;
	}

	/**
	 * Format
	 */
	public function getHeaderClass($header, $count)
	{
		return 'th-' . String::slug($header) . ' th' . $count;
	}

	/**
	 * Apply the sort key to <th>
	 *  - Take into account current query
	 */
	public function applyHeaderSort($label, $sortKey)
	{
		switch (UIKit::getEnvironment()) {
			case 'laravel':
					dd('laravel');
				break;
			default:

					if (isset($this->options['query'])) {
						if (!isset($this->options['query']['direction'])) {
							$dir = 'asc';
						} else {
							($this->options['query']['direction'] == 'asc') ? $dir = 'desc' : $dir = 'asc';
						}
					}

					$params = array_merge($this->options['query'], array('sort' => $sortKey, 'direction' => $dir));
					$url = '?'.http_build_query($params, null, '&');

					return "<a href=\"{$url}\" class=\"sort-{$dir}\">{$label}</a>";
				break;
		}
	}

	/**
	 * Just render the table
	 */
	public function __toString()
	{
		return $this->render();
	}

}
