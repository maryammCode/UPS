/* console.log("hey");
function tinymce_init_callback(editor) {
    editor.remove();
    editor = null;

    tinymce.init({
        selector: "textarea.richTextBox",
        min_height: 600,
        resize: "vertical",
        plugins:
            " preview  searchreplace autolink directionality visualblocks visualchars fullscreen image link media   table charmap  pagebreak nonbreaking anchor insertdatetime  lists  wordcount ",
        extended_valid_elements:
            "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
        file_browser_callback: function (field_name, url, type, win) {
            if (type == "image") {
                $("#upload_file").trigger("click");
            }
        },
        toolbar:
            "styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy |  code",
        convert_urls: false,
        image_caption: true,
        image_title: true,
    });
}
 */
