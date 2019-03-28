import axios from 'axios';
import chosen from 'chosen-js';

$(document).ready(function () {

    const $regionSelect = $('#region');
    const $citySelect = $('#city');
    const $districtSelect = $('#district');

    const $territory = $('[name=territory_id]');

    const options = {
        disable_search_threshold: 10,
        allow_single_deselect: true,
        search_contains: true,
        placeholder_text_single: 'Select item...',
    };

    $regionSelect.chosen(options);
    $citySelect.chosen(options);
    $districtSelect.chosen(options);

    $regionSelect.on('change', function () {
        let id = $(this).val();
        $territory.val(id);
        axios.get('/territory/' + id + '/nested')
            .then(response => {
                $citySelect
                    .children()
                    .remove()
                    .end()
                    .append(response.data);
                $citySelect.trigger('chosen:updated');
                $districtSelect
                    .children()
                    .remove();
                $districtSelect.trigger('chosen:updated');
            });
    });

    $citySelect.on('change', function () {
        let id = $(this).val();
        $territory.val(id);
        axios.get('/territory/' + id + '/nested')
            .then(response => {
                $districtSelect
                    .children()
                    .remove()
                    .end()
                    .append(response.data);
                $districtSelect.trigger('chosen:updated');
            });
    });

    $districtSelect.on('change', function () {
        let id = $(this).val();
        $territory.val(id);
    });


    /* Validations */

    const $territoryForm = $('#territory-form');

    $territoryForm.on('submit', function (e) {
        e.preventDefault();
        $territoryForm.find('.help-block').remove();
        const data = $territoryForm.serialize();
        axios.post(
            $territoryForm.attr('action'),
            data
        )
            .then(response => {
                if (response.data.success && response.data.payload) {
                    let id = response.data.payload.id;
                    window.location.href = '/peoples/' + id;
                }
            })
            .catch(error => {
                if (error.response && error.response.status === 422) {
                    let errors = error.response.data && error.response.data.errors;
                    for (let name in errors) {
                        let value = errors[name];
                        $('[name=' + name + ']')
                            .parent('.form-group')
                            .addClass('has-error text-danger')
                            .append('<span class="help-block">' + value + '</span>');
                    }
                }
            });
    });
});
