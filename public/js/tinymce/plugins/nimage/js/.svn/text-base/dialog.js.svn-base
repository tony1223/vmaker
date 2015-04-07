tinyMCEPopup.requireLangPack();

var EventFieldsDialog = {
	init : function() {
		var f = document.forms[0];

		// Get the selected contents as text and place it in the input
		f.someval.value = tinyMCEPopup.editor.selection.getContent({format : 'text'});
		f.somearg.value = tinyMCEPopup.getWindowArg('some_custom_arg');
	},

	insert : function(f_n) {
		// Insert the contents from the input into the document
		tinyMCEPopup.editor.execCommand('mceInsertContent', false, f_n);
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(EventFieldsDialog.init, EventFieldsDialog);
