$( document ).ready(function() {
});




function menuClick(item)
{
    if (item === 'Loyalty')
    {
        $('#loyalty').css('display', 'block');
        $('#egm').css('display', 'none');
        $('#file_upload').css('display', 'none');
    } else if (item === 'EGM')
    {
        $('#loyalty').css('display', 'none');
        $('#egm').css('display', 'block');
        $('#file_upload').css('display', 'none');
    } else if (item === 'FileUpload')
    {
        $('#loyalty').css('display', 'none');
        $('#egm').css('display', 'none');
        $('#file_upload').css('display', 'block');
    }
}


