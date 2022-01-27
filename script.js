$(function () {
    prikaziFormuNova();
    search();
    filter();
});

function prikaziFormuNova() {

    $(document).on('click', '#nova-knjiga-btn', function () {
        $('#pocetna-div').hide();
        $('#formaNova').show();
    })
}

function search() {

    $(document).on('click', '#searchbtn', function () {


        let searchUnos = $('#inputsearch').val();

        $.ajax(
            {
                url: 'search.php',
                method: 'post',
                data: { keySearchUnos: searchUnos },
                success: function (rezultat) {
                    {
                        $('#pocetna-div').hide();
                        $('.main').html(rezultat);
                    }
                }
            }
        )
    })
}

function filter() {

    $(document).on('click', '#filter', function () {

        let naziv_cena = $('#naziv-cena-select').val();
        let sortiranje = $(this).attr('value');

        $.ajax(
            {
                url: 'filter.php',
                method: 'post',
                data: { keyNazivCena: naziv_cena, keySortiranje: sortiranje },
                success: function (rezultat) {
                    {
                        $('#pocetna-div').hide();
                        $('.main').html(rezultat);

                        if ($('#filter').attr('value') === 'asc')
                            $('#filter').attr('value', 'desc')

                        else if ($('#filter').attr('value') === 'desc')
                            $('#filter').attr('value', 'asc')

                    }
                }
            }
        )
    })
}