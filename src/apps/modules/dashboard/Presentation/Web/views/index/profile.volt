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
    <div class="d-flex justify-content-center align-items-center" style="height: 80%;">
        <table class="text-center">
            <tr>
                <td> <img src="{{ url(akun.getFoto()) }}" style="width: 150px; height: 150px; border-radius:75px;"> </td>
            </tr>
            <tr>
                <td> <h2> {{ akun.getNama() }} </h2> </td>
            </tr>
            <tr>
                <td> <h3>{{ akun.getUsername() }} </h3></td>
            </tr>
            <tr>
                <td> {{ akun.getTanggalLahir() }} </td>
            </tr>
        </table>
    </div>
    <a href="{{ url('dashboard/index/edit') }}" class="btn" style="position: absolute; bottom: 7%; right: 15%; width: 15%; background-color: #013880; color: white;">Edit Profile</a>
{% endblock %}