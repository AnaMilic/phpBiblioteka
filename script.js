$(function () {
    prikaziFormuNova();
});

function prikaziFormuNova() {

    $(document).on('click', '#nova-knjiga-btn', function () {
        $('#pocetna-div').hide();
        $('#formaNova').show();
    })
}