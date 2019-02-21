<script>
    $R('.redactor-textarea', {
        plugins: ['video', 'filemanager', 'widget', 'imagemanager'],
        imageUpload: '/admin/redactor/images',
        imageManagerJson: '/admin/imagemanager/',
        fileUpload: '/admin/redactor/files',
        fileManagerJson: '/admin/filemanager/',
        imageCaption: false,
        imageResizable: true
    });
</script>
