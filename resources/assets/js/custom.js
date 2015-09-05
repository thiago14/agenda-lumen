$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
})