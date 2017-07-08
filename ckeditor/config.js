/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	//config.filebrowserUploadUrl = '/ckupload/';
	//config.uiColor = '#DDCCEE';
	//config.height = '550';
	//config.filebrowserWindowWidth = '720';
    config.filebrowserWindowHeight = '480';
	//config.fileBrowserWindowFeatures = 'resizable=no,scrollbars=no,location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes';
	
	config.toolbarGroups = [
    /*{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },*/
    /*{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },*/
    { name: 'links' },
    { name: 'insert' },
    /*{ name: 'forms' },*/
    /*{ name: 'tools' },*/
    { name: 'document',    groups: [ 'mode', 'document'/*, 'doctools'*/ ] },
    { name: 'others' }, { name: 'basicstyles', groups: [ 'basicstyles'/*, 'cleanup'*/ ] },
    /*'/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
    { name: 'styles' },
    { name: 'colors' },
    { name: 'about' }*/
];

 
	 
	 //config.colorButton_colors = 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00';
	 //config.extraCss = 'body{background:#FF0000;text-align:left;font-size:50px;}';
	

};
