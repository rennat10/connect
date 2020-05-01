{% extends "template/layout.volt" %}
{% block dilink %}
    href=""
{% endblock %}
{% block navContent %}
    <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-3 mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('dashboard/index/profile') }}">Profile</span></a>
            </li>
        </ul>
    </div>
    <form class="form-inline ml-auto mb-0">
        <a class="btn my-2 my-sm-0" href="{{ url('dashboard/index/search') }}" style="background-color: white; color: #013880;"><i class="fa fa-search"></i></a>
    </form>
    <a class="nav-link" href="{{ url('dashboard/index/logout') }}">Logout</a>
{% endblock %}

{% block content %}
    <div style="margin-top: 7%;"></div>
        <form method="POST">
            <div class="container" style="background-color: white; margin-top: 3%; margin-bottom: 3%; width: 50%; border: 1px solid lightgray;">
                <div style="border-bottom: 1px solid lightgray;">
                    <img src="{{ url(status.getFoto()) }}" style="width: 50px; height: 50px; border-radius: 25px; vertical-align: top; margin-top: 1%;">
                    <div style="display: inline-block;">
                    <h3> {{ status.getUsername() }} </h3>
                        <div style="display: inline-block;">
                            <a style="font-size: 13px;"> {{ status.getWaktu() }} </a>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 2%; margin-bottom: 2%;">
                    <input type="text" name="isi" value="{{ status.getIsi() }}" style="width: 100%;">
                </div>
                <div style="margin-right: 0; margin-bottom: 2%;">
                    <button class="btn" style="color: white; background-color: #013880">Save</button>
                </div>
            </div>
        </form>
    </div>
{% endblock %}