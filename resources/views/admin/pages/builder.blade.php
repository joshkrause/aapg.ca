<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Page Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="#" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="/admin_assets/plugins/ContentBuilder/assets/minimalist-blocks/content.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/plugins/ContentBuilder/contentbuilder/contentbuilder.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/plugins/ContentBuilder/assets/scripts/simplelightbox/simplelightbox.css" rel="stylesheet"
        type="text/css" />
    <link href="/admin_assets/plugins/ContentBuilder/assets/scripts/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/plugins/ContentBuilder/assets/scripts/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/admin_assets/plugins/innovamgrpro/css/xprofiledialog.css" />

    <style>
        .container {
            margin: 120px auto;
            max-width: 800px;
            width: 100%;
            padding: 0 35px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <div class="container">
    {!!$page->html !!}
    </div>
    <!-- Hidden Form Fields to post content -->
    <form id="form1" method="post" style="display:none">
        <input type="hidden" id="inpHtml" name="inpHtml" />
        <input type="submit" id="btnPost" value="submit" />
        @csrf
    </form>

    <div class="is-tool"
        style="position:fixed;width:210px;height:50px;border:none;top:30px;bottom:auto;left:auto;right:30px;text-align:right;display:block">
        <button id="btnViewSnippets" class="classic" style="width:70px;height:50px;">+ Add</button>
        <button id="btnViewHtml" class="classic" style="width:70px;height:50px;">HTML</button>
        <button id="btnSave" class="classic" style="width:70px;height:50px;">SAVE</button>
    </div>

    <script src="/admin_assets/plugins/ContentBuilder/contentbuilder/jquery.min.js" type="text/javascript"></script>
    <script src="/admin_assets/plugins/ContentBuilder/assets/scripts/simplelightbox/simple-lightbox.min.js"
        type="text/javascript"></script>
    <script src="/admin_assets/plugins/ContentBuilder/assets/scripts/slick/slick.min.js" type="text/javascript"></script>

    <script src="/admin_assets/plugins/ContentBuilder/contentbuilder/contentbuilder.min.js" type="text/javascript"></script>
    <script src="/admin_assets/plugins/ContentBuilder/contentbuilder/saveimages.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <script src="/admin_assets/plugins/ContentBuilder/assets/minimalist-blocks/content.js" type="text/javascript"></script>

    <script src="/admin_assets/plugins/innovamgrpro/xprofile_lang.js" type="text/javascript"></script>
    <script src="/admin_assets/plugins/innovamgrpro/xprofiledialog.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            var obj = $.contentbuilder({
                container: '.container',
                snippetData: '/admin_assets/plugins/ContentBuilder/assets/minimalist-blocks/snippetlist.html',
                modulePath: '/admin_assets/plugins/ContentBuilder/assets/modules/',
                iconselect: '/admin_assets/plugins/ContentBuilder/assets/ionicons/icons.html',
                onImageSelectClick: showAssetManager,
                onFileSelectClick: showAssetManager,
                container: '.container',
                cellFormat: '<div class="col-md-12"></div>',
                rowFormat: '<div class="row"></div>',
                framework: 'bootstrap',
                moduleConfig: [{
					"moduleSaveImageHandler": "/admin/asset-manager/saveModuleImages" /* handler for module related image saving (ex. slider) */
				}],
                largerImageHandler: '/admin/asset-manager/saveLargeImages', /* handler for larger image saving */
					onRender: function () {
							$('a.is-lightbox').simpleLightbox({ closeText: '<i style="font-size:35px" class="icon ion-ios-close-empty"></i>', navText: ['<i class="icon ion-ios-arrow-left"></i>', '<i class="icon ion-ios-arrow-right"></i>'], disableScroll: false });
						}
            });

            $('#submit-button').click( function(e){
                e.preventDefault();
                var html = $('.container').data('contentbuilder').html(); //.viewHtml();
                $('#html-input').val(html);
                $('#page-form').submit();
                $("html").fadeOut(1000);
            });

            $('#btnViewSnippets').on('click', function () {
                obj.viewSnippets();
            });

            $('#btnViewHtml').on('click', function () {
                obj.viewHtml();
            });

            $('#btnSave').on('click', function () {
                save(obj);
            });

            runPlugins();

        });

        function runPlugins() {
            $('a.is-lightbox').simpleLightbox({ closeText: '<i style="font-size:35px" class="icon ion-ios-close-empty"></i>', navText: ['<i class="icon ion-ios-arrow-left"></i>', '<i class="icon ion-ios-arrow-right"></i>'], disableScroll: false });
        }

        function save(obj) {

            $(".container").saveimages({
                handler: '/admin/asset-manager/saveImages', /* handler for base64 image saving */
                onComplete: function () {

                    //Get html
                    var html = obj.html(); //Get content

                    //Submit the html to the server for saving. For example, if you're using html form:
                    $('#inpHtml').val(html);
                    $('#btnPost').click();

                }
            });
            $(".container").data('saveimages').save();

            $("html").fadeOut(1000);
        }

    </script>

    <script type="text/javascript">
        function showAssetManager(selEv)
        {
            dlg = new XPROFileDialog({
                url: "/admin/asset-manager",
                onSelect: function(data) {
                    var inp = jQuery(selEv.targetInput).val(data.url);
                }
            });
            dlg.open();
            // swap icons on asset manager
            $('i.xf-icon.icon-ok').removeClass('xf-icon icon-ok').addClass('fa fa-check');
            $('i.xf-icon.icon-cancel').removeClass('xf-icon icon-cancel').addClass('fa fa-times');
        }

        function value() {
            /* This is how to get the HTML (for saving into a database) */
            var sHTML = $('.container').data('contentbuilder').viewHtml();
        }

    </script>
    <script src="/admin_assets/plugins/ContentBuilder/assets/scripts/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>

</html>