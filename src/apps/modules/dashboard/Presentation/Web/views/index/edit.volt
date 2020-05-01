{% extends "template/layout.volt" %}
{% block dilink %}
    href="{{ url('dashboard/index/home') }}"
{% endblock %}
{% block navContent %}
    <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-3 mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">Profile</span></a>
            </li>
        </ul>
    </div>
    <form class="form-inline ml-auto mb-0" action="{{ url('dashboard/index/search') }}">
        <button class="btn my-2 my-sm-0" type="submit" style="background-color: white; color: #013880;"><i class="fa fa-search"></i></button>
    </form>
    <a class="nav-link" href="{{ url('dashboard/index/logout') }}">Logout</a>
{% endblock %}

{% block content %}
    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
        <form class="text-center" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label>
                <img src="{{ url( akun.getFoto() ) }}" style="height: 150px; width: 150px;border-radius: 75px;"> 
                <input type="file" style="display: none;" value="{{ url(akun.getFoto()) }}" name="foto">
            </label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="editForm" value="{{ akun.getNama() }}" name="nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="editForm" value="{{ akun.getUsername() }}" name="username" readonly>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="editForm" value="{{ akun.getTanggalLahir() }}" name="tanggal_lahir">
            </div>
            <button class="btn" style="background-color: #013880; color: white;"> Save </button>
        </form>
    </div>
{% endblock %}