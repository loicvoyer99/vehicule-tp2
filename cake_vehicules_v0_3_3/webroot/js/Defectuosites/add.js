$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#defectuosite-id').on('change', function () {
        var defectuositeId = $(this).val();
        if (defectuositeId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'defectuosite_id=' + defectuositeId,
                success: function (subdefectuosites) {
                    $select = $('#subdefectuosite-id');
                    $select.find('option').remove();
                    $.each(subdefectuosites, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#subdefectuosite-id').html('<option value="">Select Defectuosite first</option>');
        }
    });
});


