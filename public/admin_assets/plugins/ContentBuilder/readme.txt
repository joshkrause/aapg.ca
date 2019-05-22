ContentBuilder.js ver. 3.2.15


*** USAGE ***

1. Include:

	<link href="contentbuilder/contentbuilder.css" rel="stylesheet" type="text/css" />

	<script src="contentbuilder/contentbuilder.js" type="text/javascript"></script>

2. Run:

    var obj = $.contentbuilder({
        container: '.container'
    });

	Specify your editing area in container parameter.

3. To get HTML:

    obj.html();

	
See example1.html for a basic implementation.


*** USING IN BOOTSTRAP FRAMEWORK ***

TRY: example1-bootstrap.html

Specify framework parameter as follows:

    var obj = $.contentbuilder({
        container: '.container',
		framework: 'bootstrap'
    });
	

*** USING IN FOUNDATION FRAMEWORK ***

TRY: example1-foundation.html

Specify framework parameter as follows:

    var obj = $.contentbuilder({
        container: '.container',
		framework: 'foundation'
    });
	

*** USING IN OTHER CSS FRAMEWORKS (12 columns grid) ***

TRY: example1-materializecss.html

Specify row & cols parameters. For example, to work with Materializecss (https://materializecss.com/grid.html):

	var obj = $.contentbuilder({
		container: '.container',
		row: 'row',
		cols: ['col s1', 'col s2', 'col s3', 'col s4', 'col s5', 'col s6', 'col s7', 'col s8', 'col s9', 'col s10', 'col s11', 'col s12']
	});


*** HOW TOs ***


SAVING EMBEDED BASE64 IMAGE AS FILE (IMPORTANT!)

	TRY: example2.php

	STEPS:

	1) Include saveimage.js script:

		<script src="contentbuilder/saveimages.js" type="text/javascript"></script>

	2) Create a complete saving method as follows:

		function save(obj) {
			$(".container").saveimages({
				handler: 'saveimage.php', /* handler for base64 image saving */
				onComplete: function () {

					//Get html
					var html = obj.html(); //Get content

					//Submit the html to the server for saving. For example, if you're using html form:
					$('#inpHtml').val(html);
					$('#btnPost').click();

				}
			});
			$(".container").data('saveimages').save();
		}

	3) Include the form for saving:

		<form id="form1" method="post" style="display:none">
			<input type="hidden" id="inpHtml" name="inpHtml" />
			<input type="submit" id="btnPost" value="submit" />
		</form>
		
	Note that image saving handler (saveimage.php) is customizable. We provide a working example in PHP and ASP.NET to save the image on a specified location on the server.


TO ENABLE DRAG & DROP BLOCKS FOR SORTING:

	STEPS:
		
	1) Just include jQuery UI & jQuery UI Touch Punch:
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
		

TO ENABLE SIDEBAR WITH DRAG & DROP CONTENT BLOCKS:

	STEPS:

	1) Include jQuery UI & jQuery UI Touch Punch:
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" type="text/javascript"></script>

	2) Include Snippet File:

		<script src="assets/minimalist-blocks/content.js" type="text/javascript"></script>


HAVING MULTIPLE EDITABLE AREAS

	TRY: example3.php
	
	STEPS:

	1) Specify 'page' parameter with parent selector. For example, your page structure is as follow:
		
		<div class="wrapper">
			...
			<div class="container">
				[editable area]
			</div>
			...
			<div class="container">
				[editable area]
			</div>
			...
		</div>

		As seen, all editable areas (div.container) are within a div.wrapper. Then you can define:

        var obj = $.contentbuilder({
			page: '.wrapper',
            container: '.container'
        });

		That's all!

	Note that when you get the html for saving using obj.html(), you will get content within div.wrapper.
	If you need to read the html for specific container, you can pass the container object using:

		var $container = $('.container:eq(0)'); /* first instance of the container */
		obj.html($container);

	If you add a container programmatically, after adding the container, call applyBehavior() method:
		
        obj.applyBehavior();

	This will make the new container become editable.



ADDING A SLIDER (IMAGE SLIDESHOW)

	To add a slider, click (+) and select "MORE". Choose "Components" tab, and select "Slider".

	Configuration needed:
		Include the slider script (js & css):

			<link href="assets/scripts/slick/slick.css" rel="stylesheet" type="text/css" />
			<link href="assets/scripts/slick/slick-theme.css" rel="stylesheet" type="text/css" />
			<script src="assets/scripts/slick/slick.min.js" type="text/javascript"></script>

		Configure the contentbuilder as follows:

			var obj = $.contentbuilder({
				container: '.container', 
				moduleConfig: [{
					"moduleSaveImageHandler": "saveimage-module.php" /* handler for module related image saving (ex. slider) */
				}]
			});

		Note that image saving handler (saveimage-module.php) is customizable. We provide a working example in PHP and ASP.NET to save the image on a specified location on the server.



ADDING IMAGE LIGHTBOX SUPPORT

	Click an image, open image link dialog. On the link input, you can upload a larger image file to be opened.

	Configuration needed:
		Include the lightbox script (js & css):
	
			<link href="assets/scripts/simplelightbox/simplelightbox.css" rel="stylesheet" type="text/css" />
			<script src="assets/scripts/simplelightbox/simple-lightbox.min.js" type="text/javascript"></script>

		Configure the contentbuilder as follows:

				var obj = $.contentbuilder({
					container: '.is-container', 
					largerImageHandler: 'saveimage-large.php', /* handler for larger image saving */
					onRender: function () {
							$('a.is-lightbox').simpleLightbox({ closeText: '<i style="font-size:35px" class="icon ion-ios-close-empty"></i>', navText: ['<i class="icon ion-ios-arrow-left"></i>', '<i class="icon ion-ios-arrow-right"></i>'], disableScroll: false });
						}
				});

		Note that image saving handler (saveimage-large.php) is customizable. We provide a working example in PHP and ASP.NET to save the image on a specified location on the server.
		By default, larger image is saved in "uploads" folder. You can change the upload folder by editing the saveimage-large.php or saveimage-large.aspx. 
		Open the file and see commented line where you can change the upload folder.

		After you upload a larger image, an image link will be displayed. 
		When you click 'Ok', an "is-lightbox" class is added. This will be used by the lightbox script:

			$('a.is-lightbox').simpleLightbox(..);
		
		Adding this lightbox command on "onRender" event will make sure that the lightbox is also working during editing.



ENABLE CUSTOM FILE & IMAGE SELECT

	In link dialog, you can enable a button to open your own custom dialog for selecting file or image.

	Configuration needed:

			var obj = $.contentbuilder({
				container: '.container', 
				imageselect: 'images.html',
				fileselect: 'files.html'
			});
			
		Please see images.html and files.html (included in this package) as a simple example. 
		Use selectAsset() function as shown in the images.html and files.html to return a value to the link dialog.

		

CUSTOMIZING SNIPPETS (CONTENT BLOCKS)

	Snippet data is stored in a json file located in:

		assets/minimalist-blocks/content.js

	This json file is processed and displayed nicely by snippetlist.html, as specified on parameter snippetData:
	
		snippetData: 'assets/minimalist-blocks/snippetlist.html'
		
	To customize the snippets, open the content.js and make the changes. Here are some attributes you can use on the snippets:

	1) To make an image not replaceable, add data-fixed attribute to the <img> element, for example:

		<img src=".." data-fixed />

	2) To make a column not editable, add data-noedit attribute on the column, for example:

		<div class="row clearfix">
			<div class="column full" data-noedit>

			</div>
		</div>
		
	3) To make a column not editable and cannot be deleted, moved or duplicated, add data-protected attribute on the column, for example:

		<div class="row clearfix">
			<div class="column full" data-protected>

			</div>
		</div>

	4) You can put snippet folder not on its default location. Path adjustment will be needed using snippetPathReplace parameter, for example:

		var obj = $.contentbuilder({
			snippetPathReplace: ['assets/minimalist-blocks/', 'mycustomfolder/assets/minimalist-blocks/'],
			...
		});


INCLUDE LANGUAGE FILE

	With language file you can translate ContentBuilder.js interface into another language. To include the language file:

		<script src="contentbuilder/lang/en.js" type="text/javascript"></script>

	Here is the language file content as seen on lang/en.js:

		var _txt = new Array();
		_txt['Bold'] = 'Bold';
		_txt['Italic'] = 'Italic';
		...

	You can create your own language file (by copying/modifying the lang/en.js) and include it on the page where contentbuilder.js is included.
	This will automatically translate the ContentBuilder.js interface.


*** OPTIONS ***

- snippetData
	Default value: 'assets/minimalist-blocks/snippetlist.html'
	Location of content block selection.

- sidePanel: 'right' | 'left'
	Default value: 'right'
	Placement of sidebar (snippets sidebar, element styles editor sidebar).

- snippetHandle
	Default value: true
	To show/hide snippets sidebar handle.

- snippetOpen
	Default value: false
	To show/hide snippets sidebar on first page load.
	
- snippetPageSliding
	Default value: false
	To enable/disable page sliding during snippets sidebar opening.

- modulePath
	Default value: 'assets/modules/'
	Path of module related files. At the moment, included is a slider (image slideshow) module.

- imageEmbed
	Default value: true
	To enable/disable image embed feature.
	
- elementEditor
	Default value: true
	To enable/disable element styles editing feature.

- sourceEditor
	Default value: true
	To enable/disable HTML source editing.

- iconselect
	Default value: 'assets/ionicons/icons.html'
	To specify icon selection dialog.

- buttons
	Default value: ["bold", "italic", "createLink", "align", "formatPara", "color", "formatting", "list", "textsettings", "font", "icon", "tags", "removeFormat"]
	To configure rich text editor buttons.

- colors
	Default value: ["#ff8f00", "#ef6c00", "#d84315", "#c62828", "#58362f", "#37474f", "#353535",
                "#f9a825", "#9e9d24", "#558b2f", "#ad1457", "#6a1b9a", "#4527a0", "#616161",
                "#00b8c9", "#009666", "#2e7d32", "#0277bd", "#1565c0", "#283593", "#9e9e9e"]
	To specify custom color selection.

- customTags
	Default value: []
	Custom tags is commonly used in a CMS for adding dynamic element within the content (by replacing the tags in production).
	Example:

		var obj = $.contentbuilder({
			customTags: [["Contact Form", "{%CONTACT_FORM%}"],
				["My Plugin", "{%MY_PLUGIN%}"]],
			...
		});

- animateModal
	Default value: true
	To enable/disable animation when a modal dialog displayed.

- customval
	Default value: ''
	Custom paramater can be used to pass any value. The value will be passed when an image is submitted on the server for saving. 
	In a CMS application, you can pass (for example) a user id or session id, etc. On the server, image handler can use this value to decide where to save the image for each user.
	This is more of to your custom application.

- imageQuality
	Default value: 0.92
	To specify image embed quality.


*** EVENTS ***


- onRender
	Triggered when new snippet added (or content changed). If there are custom extensions/plugins within the content, re-init the plugins here.

- onChange
	Triggered when content changed.

- onImageBrowseClick
	Triggered when image browse icon is clicked.

- onImageSettingClick
	Triggered when image link icon is clicked.

- onImageSelectClick
	Triggered when custom image select button is clicked.
	If onImageSelectClick event is used, custom image select button will be displayed on the image link dialog.

- onFileSelectClick
	Triggered when custom file select button is clicked.
	If onFileSelectClick event is used, custom file select button will be displayed on the link dialog.


*** METHODS ***


- viewHtml()
	To view HTML
	
- loadHtml(html)
	To load HTML at runtime.

- viewSnippets(opensidebar)
	To open snippet selection.

	opensidebar: true|false (default: false)
		true: will open snippet sidebar 
		false: will open snippet dialog

- destroy()
	To disable/destroy the plugin.


*** EXAMPLES ***


- example1.html (basic)

- example2.php and example2.aspx (saving example)

- example3.php and example3.aspx (multiple instance example)

- example4.html (enable custom file and image select dialog)

	On the link dialog, you will see ... icon to open your custom image/file select dialog).
	
- example5.php and example5.aspx (complete example, showing how to add a simple lightbox JQuery plugin and how to make slider snippet works)



*** USING IN EMAIL BUILDING ***

Extra Blocks for email building using Foundation framework is included (assets/email-blocks/snippetlist.html).

See: example-email.html

Usage: 
	
	Please set emailMode and absolutePath parameters to true.

        var obj = $.contentbuilder({
            container: '#contentarea',
            snippetData: 'assets/email-blocks/snippetlist.html',
            rowFormat: '<div><table align="center" class="container float-center"><tbody><tr><td><table class="row"><tbody><tr>' +
                '</tr></tbody></table></td></tr></tbody></table></div>',
            cellFormat: '<th class="small-12 large-12 columns first last"><table><tbody><tr><th>' +
                '</th></tr></tbody></table></th>',
            customTags: [["First Name", "{%first_name%}"],
                ["Last Name", "{%last_name%}"],
                ["Email", "{%email%}"]],
            emailMode: true,
            absolutePath:true
        });

More about Foundation for Email framework: http://foundation.zurb.com/emails/getting-started.html

	

*** SUPPORT ***

Email us at: support@innovastudio.com



---- IMPORTANT NOTE : ---- 
1. Custom Development is beyond of our support scope.
 
Once you get the HTML content, then it is more of to user's custom application (eg. posting it to the server for saving into a file, database, etc).
PHP programming, ASP.NET programming or server side implementation is beyond of our support scope. 
We also do not provide free custom development of extra features or functionalities.

2. Our support doesn't cover custom integration into users' applications. It is users' responsibility.
------------------------------------------
