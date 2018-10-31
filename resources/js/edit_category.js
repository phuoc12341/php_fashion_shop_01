
    $(document).ready(function() {
        var top_category_id = $('input[name = "top_category"]:checked').val();
        var parent_id = $('select[name = "parent_category"]').data('parentid');
        $.get('admin/ajax/category/' + top_category_id, function(data) {
            $('select[name = parent_category]').html('');
            $.each(data, function() {
                $.each(this, function(index, val) {
                    if (index == parent_id) {
                        $('select[name = parent_category]').append("<option value='" + index + "'selected>" + val + "</option>");
                    } else {
                        $('select[name = parent_category]').append("<option value='" + index + "'>" + val + "</option>");
                    }
                });
            });
        });

        $('input[name = "top_category"]').change(function(event) {
            var selected_top_category_id = $(this).val();
            $.get('admin/ajax/category/' + selected_top_category_id, function(data) {
                $('select[name = parent_category]').html('');
                $.each(data, function() {
                    $.each(this, function(index, val) {
                        $('select[name = parent_category]').append("<option value='" + index + "'>" + val + "</option>");
                    });
                });
            });
        });
    });
