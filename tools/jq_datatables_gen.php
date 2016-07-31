<?php
include ('../qcubed.inc.php');

require(__DOCROOT__ . __PHP_ASSETS__ . '/_devtools/jquery_ui_gen/jq_control.php');

/**
 * Class DataTablesJqDoc
 *
 * Scrapes the datatables website for documentation in order to build a PHP interface to it.
 *
 * As of this writing, the Datatables docomentation is no longer available in a single file, but is scattered
 * online. So, we need to navigate to each page individually in order to build the interface.
 *
 * It is possible to download the documentation before scraping it. See comment at bottom.
 *
 * Its likely that every time you run this, you will have to fix problems with it. The structure of the Datatables documentation
 * changes often, as well as well as the tools to do the scraping.
 */


class DataTablesJqDoc extends JqDoc
{
    public $descriptionLine = 3000;
    public $hasDisabledProperty = false;

    public function __construct($strBaseUrl)
	{
		parent::__construct('DataTables', 'dataTable', 'QDataTable', 'QHtmlTable');

		$strUrl = $strBaseUrl . 'option';
		$this->buildOptions($strUrl);
		$strUrl = $strBaseUrl . 'api';
		$this->buildApis($strUrl);

		//TODO: Scrape the events
	}



	protected function buildOptions($strUrl)
	{
		$html = file_get_html($strUrl . '/index.html');
		$h2s = $html->find('h2');
		foreach ($h2s as $h2) {
			$codes = $h2->next_sibling()->find("code[class=option]");
			foreach ($codes as $codeTag) {
				$parentTag = $codeTag->parent();
				$href = $parentTag->href;
				if ($href) {
					if (substr($href, 0, 2) == '//') {
						$href = 'http:' . $parentTag->href;
					}
					else {
						// assume this is a local copy of the datatables website, using something like httrack
						$href = $strUrl . '/' . $href;
					}
					$this->buildOption($href);
				}
			}
		}
	}

	protected function buildOption($strUrl)
	{
		$defaultValue = null;
		$description = null;
		$type = null;

		$html = file_get_html($strUrl);

		$origName = $html->find('h1[class=page_title]', 0)->innertext;

		if (strpos($origName, '.') !== false) {
			return;	// documenting a named parameter. This is covered by another option.
		}
		$name = ucfirst($origName);

		// type
		$typeNodes = $html->find('div[class=ref_type]');
		if ($typeNodes) {
			if (count($typeNodes) > 1) {
				$type = 'mixed';
			} else {
				$type = $typeNodes[0]->children(0)->name;
			}
		}
		else {
			$typeNode = $html->find('h2[data-anchor=Type]',0);
			if ($typeNode) {
				$typeNode = $typeNode->next_sibling()->next_sibling()->find('code[class=type]', 0);
				$type = $typeNode->innertext;
				$type = explode('<', $type)[0]; // get words before additional tags
			}
		}


		// default value
		if ($type != 'mixed' && $type != 'function') {
			$defaultNode = $html->find('h2[data-anchor=Default]',0);
			if ($defaultNode) {
				$defaultNode = $defaultNode->next_sibling()->find('code', 0);
				if ($defaultNode) {
					$defaultValue = $defaultNode->innertext;
				} else {
					// website error
				}
			}
		}

		// description
		$descriptionNode = $html->find('h2[data-anchor=Description]',0)->next_sibling();
		if ($descriptionNode) {
			$description = $descriptionNode->plaintext;
		}

		if ($type == 'string' && $defaultValue) {
			$defaultValue = '"' . $defaultValue . '"';
		}

		$this->options[] = new Option($name, $origName, $type, $defaultValue, $description);
	}


	protected function buildApis($strUrl) {
		$html = file_get_html($strUrl . '/index.html');
		$h2s = $html->find('h2');
		foreach ($h2s as $h2) {
			$codes = $h2->next_sibling()->find("code[class=api]");
			foreach ($codes as $codeTag) {
				$parentTag = $codeTag->parent();
				$href = $parentTag->href;
				if ($href) {
					if (substr($href, 0, 2) == '//') {
						$href = 'http:' . $parentTag->href;
					} else {
						// assume this is a local copy of the datatables website, using something like httrack
						$href = $strUrl . '/' . $href;
					}
					$this->buildApi($href);
				}
			}
		}
	}

	protected function buildApi($strUrl) {
		$defaultValue = null;
		$description = null;
		$type = null;

		$html = file_get_html($strUrl);

		$origName = $html->find('h1[class=page_title]', 0)->innertext;

		if (strpos($origName, '.') !== false) {
			return;	// documenting a named parameter. This is covered by another option.
		}
		if (!strpos($origName, '(') !== false) {
			return;	// Not actually an api call. Probably one tht has subcalls, which we can't really use in PHP
		}

		if (strpos($origName,'$') !== false) {
			return;
		}
		if (strpos($origName,'iterator') !== false) {
			return;
		}


		$origName = substr($origName, 0, strpos ($origName, '('));
		$name = ucfirst($origName);


		// type
		$typeNodes = $html->find('div[class=ref_type]');
		if ($typeNodes) {
			// Overloaded function
			if (count($typeNodes) > 1) {
				$count = 1;
				foreach ($typeNodes as $typeNode) {
					$description = $typeNode->find('dd[class=description]', 0)->plaintext;
					$h3 = $typeNode->find('h3',0);
					$signature = $h3->innertext;
					$signature = substr ($signature, strpos($signature, '</span>') + 7);
					$this->methods[] = new Method($name . $count, $origName, $signature, $description);
					$count++;
				}
			} else {
				$typeNode = $typeNodes[0];
				$description = $typeNode->find('dd[class=description]', 0)->plaintext;
				$h3 = $typeNode->find('h3',0);
				$signature = $h3->innertext;
				$signature = substr ($signature, strpos($signature, '</span>') + 7);
				$signature = trim($signature);
				$this->methods[] = new Method($name, $origName, $signature, $description);
			}
		}
		else {
			// error
		}
	}
}

/**
 * Main entry point for generating api. The api is generated by scraping the datatables website.
 *
 * The api is extensive, and directly scraping the website might be too slow to complete in the maximum allowed time
 * of your php installation. If you are doing extensive work on the api, it is recommended to use a local copy of the
 * website.
 *
 * One way to create a local copy usable by this generator is to use the following command:
 *
 * httrack 'https://datatables.net/reference/' -O your_output_dir
 */
function jq_datatables_gen()
{
	$strUrl = 'https://datatables.net/reference/';

	// example of using a local copy mapped to a local domain.
	//$strUrl = 'http://home.dev/datatables/datatables.net/reference/';

	// EDIT: the scroper no longer works.
	// TODO: The datatables website has been restructured, and soe we need to fix the scraper to look for things in the right place.
	// TODO: JqControlGen assume that options can be changed after initialization. DataTables does no allow this.
	// TODO: Calling methods in datatables requires getting the instance in a way different than jQuery UI. See
	// The current QDataTableGen.php file for how methods should be called.

	$jqControlGen = new JqControlGen();
    $objJqDoc = new DataTablesJqDoc($strUrl);
    $jqControlGen->GenerateControl($objJqDoc, dirname(__FILE__) . '/../includes', dirname(__FILE__) . '/../includes');
}

jq_datatables_gen();

?>
 
