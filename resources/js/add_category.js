    
    $(document).ready(function() {
        var id_top_category = $('input[name = top_category]').val();
        $.get('admin/ajax/category/' + id_top_category, function(data) {
            $('select[name = parent_category]').html('');
            $.each(data, function() {
                $.each(this, function(index, val) {
                    $('select[name = parent_category]').append("<option value='" + index + "'>" + val + "</option>");
                });
            });
        });

        $('input[name = top_category]').change(function(event) {
            var id_top_category = $(this).val();
            $.get('admin/ajax/category/' + id_top_category, function(data) {
                $('select[name = parent_category]').html('');
                $.each(data, function() {
                    $.each(this, function(index, val) {
                        $('select[name = parent_category]').append("<option value='" + index + "'>" + val + "</option>");
                    });
                });
            });
        });
    });
