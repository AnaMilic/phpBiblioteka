<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item" style="margin-right: 20px;">
                    <a class="nav-link active" aria-current="page" href="index.php">Početna</a>
                </li>

                <li>
                    <select id="naziv-cena-select" class="form-select text-center">
                        <option value="naziv_knjige" style="padding-left: 25px;">Naziv</option>
                        <option value="cena">Cena</option>
                    </select>
                </li>

                <li style="margin-left: 5px;">
                    <button class="btn btn-outline-success mx-3" type="button" id="filter" value="asc">Filter</button>
                </li>

                <li class="nav-item" id="nova-knjiga-nav">
                    <a class="navbar-brand" href="#"><button class="btn btn-primary" id="nova-knjiga-btn">Dodaj knjigu</button></a>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-success mx-3" type="button" id="searchbtn">Search</button>
                <input class="form-control me-2" type="search" placeholder="Search" id="inputsearch" aria-label="Search">
            </form>
        </div>
    </div>
</nav>