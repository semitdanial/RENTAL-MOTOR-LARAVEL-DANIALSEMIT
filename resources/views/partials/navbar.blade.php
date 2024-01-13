<nav class="navbar navbar-expand-lg pt-4">
    <div class="container-fluid">
        <a href="#" class="brand text-decoration-none d-block d-lg-none fw-bold fs-1">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="nav-length" class="navbar-nav justify-content-between border-top border-2 text-center">
                <li class="nav-item">
                    <a href="/" class="nav-link border-hover py-3 text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link border-hover py-3 text-white">Our Services</a>
                </li>
                <li class="nav-item">
                    <a href="/newbike" class="nav-link border-hover py-3 text-white">New Motorbike</a>
                </li>
                <li class="nav-item">
                    <a href="/contacts" class="nav-link border-hover py-3 text-white">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link border-hover py-3 text-white">Sign up</a>
                </li>
                <li class="nav-item">
                    <a href="/login" id="sign-in" class="nav-link {{ ($title === "Login") ? 'active' : '' }} my-2 px-4 text-white">
                        <img class="me-3" src="/img/person-fill.svg" alt="person-circle icon">
                        Sign In
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex position-fixed">
    <div class="d-flex flex-column icon-container p-3" id="socialWrap">
        <a href="https://twitter.com" target="_blank">
            <img class="icon-height my-3" src="/img/twitter.svg" alt="twitter">
        </a>
        <a href="https://facebook.com" target="_blank">
            <img class="icon-height my-3" src="/img/facebook.svg" alt="facebook">
        </a>
        <a href="https://www.instagram.com/danialsemit/" target="_blank">
            <img class="icon-height my-3" src="/img/instagram.svg" alt="instagram">
        </a>
        <a href="https://www.youtube.com/@kontenvirtual" target="_blank">
            <img class="icon-height my-3" src="/img/youtube.svg" alt="youtube">
        </a>
    </div>
</div>

