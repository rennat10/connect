{% extends "template/layout.volt" %}
{% block style %}
    body {
        background: #013880!important;
    }
{% endblock %}

{% block navContent %}
    <ul class="nav navbar-nav ml-auto mr-2 h-100">
        <li class="nav-item d-flex align-items-center">
            <a class="nav-link" href="{{ url('') }}">Login</a>
        </li>
    </ul>
{% endblock %}

{% block content %}
    <div class="h-100 d-flex justify-content-center align-items-center">
        <form class="form-signin" id="loginForm" method="POST" enctype="multipart/form-data">
            <h3 class="text-center" style="margin-bottom: 7%;">Daftar</h3>
            <div class="form-group ml-5">
                <a>Nama Lengkap</a>
                <input type="text" id="loginInput" name="nama"></input>
            </div>
            <div class="form-group ml-5">
                <a>Username</a>
                <input type="text" id="loginInput" name="username"></input>
            </div>
            <div class="form-group ml-5">
                <a>Tanggal Lahir</a>
                <input type="date" id="loginInput" name="tanggal_lahir"></input>
            </div>
            <div class="form-group ml-5">
                <a>Password</a>
                <input type="password" id="loginInput" name="password"></input>
            </div>
            <center>
                <button class="btn" style="margin-top: 2%">Login</button>
            </center>
        </form>
    </div>
{% endblock %}