$(function() {
    $('.editable').inlineEdit({
        buttonText: 'Add',
        save: function(e, data) {
            return confirm('Change name to '+ data.value +'?');
        }
    });
});