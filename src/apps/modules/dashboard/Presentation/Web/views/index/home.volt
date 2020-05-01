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
    {% for list in status %}
        <div class="container" style="background-color: white; margin-top: 3%; margin-bottom: 3%; width: 50%; border: 1px solid lightgray;">
            <div style="border-bottom: 1px solid lightgray;">
                <img src="{{ url(list.getFoto()) }}" style="width: 50px; height: 50px; border-radius: 25px; vertical-align: top; margin-top: 1%;">
                <div style="display: inline-block;">
                <h3> {{ list.getUsername() }} </h3>
                    <div style="display: inline-block;">
                        <a style="font-size: 13px;"> {{ list.getWaktu() }} </a>
                    </div>
                </div>
                {% if list.getUsername() == akun.getUsername() %}
                <div style="float: right; margin-top: 2%;">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white; color:black; border:none; outline: none;">
                        <i class="fa fa-ellipsis-v fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <input type="hidden" name="id" value="{{ list.getId() }}">
                        <a class="dropdown-item" href="{{ url('dashboard/index/editStatus/' ~ list.getId()) }}">Edit</a>
                        <form action="{{ url('dashboard/index/deleteStatus') }}" method="POST">
                            <input type="hidden" name="id" value="{{ list.getId() }}">
                            <button class="dropdown-item" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                {% endif %}
            </div>
            <div style="margin-top: 2%; margin-bottom: 2%;">
                <a> {{ list.getIsi() }} </a>
            </div>
            <div style="margin-bottom: 1%;">
                <form action="{{ url('dashboard/index/likes')}}" method="POST">
                    {% set flag = false %}
                    {% for like in likes %}
                        {% if like.getId() == list.getId() %}
                            {% set flag = true %}
                            {% break %}
                        {% endif %}
                    {% endfor %}
                    <input type="hidden" name="id" value="{{ list.getId() }}">
                    <input type="hidden" name="likesCnt" value="{{ list.getLikesCnt() }}">
                    <input type="hidden" name="username" value="{{akun.getUsername()}}">
                    {% if flag == false %}
                        <input type="hidden" name="jenis" value="likes">
                    {% else %}
                        <input type="hidden" name="jenis" value="unlikes">
                    {% endif %}
                    <button class="lock" style="color: black; text-decoration: none; border: none; background-color: white; outline: none; cursor: pointer;">
                        <i class="fa fa-heart-o fa-lg" {% if flag == false %} id="icon" {% else %} id="iconhover" {% endif %} style="margin-right: 1%;"></i>
                        <i class="fa fa-heart fa-lg" {% if flag == false %} id="iconhover" {% else %} id="icon" {% endif %} style="margin-right: 1%;"></i>
                    </button>
                </form>
            </div>
            {% if list.getLikesCnt() > 0 %}
            <form action="{{ url('dashboard/index/likes') }}" method="POST">
                <div style="border-bottom: 1px solid lightgray;">
                    <input type="hidden" name="id" value="{{ list.getId() }}">
                    <input type="hidden" name="jenis" value="list">
                    <button style="border : none; background-color: white; outline: none; cursor: pointer">{{list.getLikesCnt()}} likes</button>
                </div>
            </form>
            {% endif %}
            {% for clist in comment %}
                {% if clist.getId() == list.getId() %}
                <div style="border-bottom: 1px solid lightgray; border-top: 1px solid lightgray; margin-top: 2%; margin-bottom: 2%; padding-top: 1%; padding-bottom: 1%;">
                    <img src="{{ url(clist.getFoto()) }}" style="width: 20px; height: 20px; border-radius: 10px; vertical-align: middle;">
                    <div style="display: inline-block;">
                    <a style="font-weight: bold;">{{ clist.getUsername() }}</a>
                    <span>{{ clist.getComment() }}</span>
                    </div>
                    <div>
                        <a style="font-size: 12px; right: 0;">{{ clist.getWaktu() }}</a>
                    </div>
                </div>
                {% endif %}
            {% endfor %}
            <div style="margin-top: 2%; margin-bottom: 2%;">
                <form method="POST">
                    <input type="hidden" name="id" value="{{ list.getId() }}">
                    <input type="hidden" name="foto" value="{{ akun.getFoto() }}">
                    <input type="text" placeholder="Add a comment..." style="border: none; outline: none; width: 90%;" name="comment">
                    <button style="border:none; background-color: white; font-weight: bold width: 10%;" >Post</button>
                </form>
            </div>
        </div>
    {% endfor %}
    <form action="{{ url('dashboard/index/newStatus')}}" method="POST">
        <div class="d-flex justify-content-center" id="statusInputDiv" style="position: fixed;">
            <input type="hidden" value="{{ akun.getUsername() }}" name="username">
            <input type="text" id="statusInput" placeholder="New Status" name="isi">
            <button class="text-center" style="width: 5%; background-color: #013880; border: 1px solid white;">
                <i class="fa fa-angle-right fa-2x" aria-hidden="true" style="color: white;"></i>
            </button>
        </div>
    </form>
{% endblock %}