<?php
/**
 * Views: Template manager 
 * Page content and structure is managed with a seperate page object.
 *
 */
class Template {

	private $page;
	
	/**
	 * Include our page class, and build a page object to manage the content and structure of the page
	 * @param Object of our registry object
 	 */
	public function __construct( Registry $registry )
	{
		$this->registry = $registry;
		include( FRAMEWORK_PATH . '/registry/page.class.php');
		$this->page = new Page( $this->registry );
	}
	/**
	 * Set the content of a the page based on a number of templates
	 * pass template file locations as individual arguments
	 * @return void
	 */
	 public function buildFromTemplates()
	 	{
	 	$bits = func_get_args();
	 	$content = "";
	 	foreach( $bits as $bit )
	 	{
	 	
	 		if( strpos( $bit, 'views/' ) === false )
	 		{
	 			$bit = '/views' . $this->registry->getSetting('view') . '/templates/' . $bit;
	 		}
	 		$this->page->addTemplateBit($tag, $bit);
	 		}
	 		if( file_exists( $bit ) == true )
	 		{
	 			$content .= file_get_contents( $bit );
	 		}	
	 	}
	 	$this->page->setContent( $content );
	 }			
	 	

