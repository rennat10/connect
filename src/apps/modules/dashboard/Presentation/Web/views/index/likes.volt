{% extends "template/layout.volt" %}
{% block dilink %}
    href="{{url('dashboard/index/home')}}"
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
    <div class="container" style="background-color: white; margin-top: 3%; margin-bottom: 3%; width: 50%; border: 1px solid lightgray;">
        <h3>User Likes</h3>
        {% for user in userLikes %}
            <div style="border-top: 1px solid lightgray; border-bottom: 1px solid lightgray; margin-top: 2%; margin-bottom: 2%;">
                <a>{{ user.getUsername() }}</a>
            </div>
        {% endfor %}
    </div>
{% endblock %}