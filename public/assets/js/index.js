$(function(){
    $(document).on('select2:open', () => {
        let allFound = document.querySelectorAll('.select2-container--open .select2-search__field');
        allFound[allFound.length - 1].focus();
    });
    EasyApp.initSelect($('form'))
})