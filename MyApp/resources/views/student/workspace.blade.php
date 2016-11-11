@extends('layouts.student')

@section('header')

    <!-- Styles -->
    {{--<link rel="stylesheet" href="{{URL::asset('/resources/assets/jQuery.filer/css/jquery.filer.css')}}" type="text/css"/>--}}
    {{--<link rel="stylesheet" href="{{URL::asset('/resources/assets/jQuery.filer/css/jquery.filer-dragdropbox-theme.css')}}" type="text/css"/>--}}

    {{--<link href="/jQuery.filer/css/jquery.filer.css" rel="stylesheet">--}}
    {{--<link href="/jQuery.filer/css/jquery.filer-dragdropbox-theme.css" rel="stylesheet">--}}


    {{--{!!Html::style('/resources/assets/jQuery.filer/css/jquery.filer-dragdropbox-theme.css')!!}--}}
    {{--{!!Html::style('/resources/assets/jQuery.filer/css/jquery.filer.css')!!}--}}



{{--    <script src={{url('http://code.jquery.com/jquery-3.1.0.min.js')}}></script>--}}
    {{--<script src="http://code.jquery.com/jquery-3.1.0.min.js" crossorigin="anonymous"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

    {{--<link href="/jQuery.filer/js/custom.js" rel="stylesheet">--}}
    {{--<link href="/jQuery.filer/js/jquery.filer.min.js" rel="stylesheet">--}}
    {{--<link href="http://code.jquery.com/jquery-3.1.0.min.js" rel="stylesheet">--}}

    {{--<script src="{{URL::asset('/resources/assets/jQuery.filer/js/custom.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::asset('/resources/assets/jQuery.filer/js/jquery.filer.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::asset('http://code.jquery.com/jquery-3.1.0.min.js')}}" crossorigin="anonymous"></script>--}}

    {{--{!!Html::script('//code.jquery.com/jquery-3.1.0.min.js')!!}--}}
    {{--{!!Html::style('/resources/assets/jQuery.filer/js/jquery.filer.min.js')!!}--}}
    {{--{!!Html::style('/resources/assets/jQuery.filer/js/custom.js')!!}--}}


    <!-- Google Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">--}}

    <style>
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }
        .jFiler {
            font-family: inherit;
        }
    </style>

@endsection



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Workspace</div>



                    <div class="panel-body">
                        Add files and make necessary comments. Remember to delete documents that are no longer valid.

                        <br><br><br>
                        {{--<form enctype="multipart/form-data" action="workspace2" method="POST">--}}
                            {{--<label>Add files</label>--}}
                            {{--<input id="infile" type="file" name="infile[]" multiple><br>--}}
                            {{-- <input type="hidden" name="_token" value="{{ scrf_token() }}">--}}
                            {{--<input type="submit" class="pull-left btn btn-sm btn-primary" value="Add">--}}
                            {{--{{ csrf_field() }}--}}
                        {{--</form>--}}


                        <input type="file" name="files[]" id="filer_input2" multiple="multiple">




                        <script>


                            {{--$(document).ready(function(){--}}

                                {{--//Example 2--}}
                                {{--$("#filer_input2").filer({--}}
                                    {{--limit: null,--}}
                                    {{--maxSize: null,--}}
                                    {{--extensions: null,--}}
                                    {{--changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',--}}
                                    {{--showThumbs: true,--}}
                                    {{--theme: "dragdropbox",--}}
                                    {{--templates: {--}}
                                        {{--box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',--}}
                                        {{--item: '<li class="jFiler-item">\--}}
						{{--<div class="jFiler-item-container">\--}}
							{{--<div class="jFiler-item-inner">\--}}
								{{--<div class="jFiler-item-thumb">\--}}
									{{--<div class="jFiler-item-status"></div>\--}}
									{{--<div class="jFiler-item-thumb-overlay">\--}}
										{{--<div class="jFiler-item-info">\--}}
											{{--<div style="display:table-cell;vertical-align: middle;">\--}}
												{{--<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\--}}
												{{--<span class="jFiler-item-others">{{fi-size2}}</span>\--}}
											{{--</div>\--}}
										{{--</div>\--}}
									{{--</div>\--}}
									{{--{{fi-image}}\--}}
								{{--</div>\--}}
								{{--<div class="jFiler-item-assets jFiler-row">\--}}
									{{--<ul class="list-inline pull-left">\--}}
										{{--<li>{{fi-progressBar}}</li>\--}}
									{{--</ul>\--}}
									{{--<ul class="list-inline pull-right">\--}}
										{{--<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\--}}
									{{--</ul>\--}}
								{{--</div>\--}}
							{{--</div>\--}}
						{{--</div>\--}}
					{{--</li>',--}}
                                        {{--itemAppend: '<li class="jFiler-item">\--}}
							{{--<div class="jFiler-item-container">\--}}
								{{--<div class="jFiler-item-inner">\--}}
									{{--<div class="jFiler-item-thumb">\--}}
										{{--<div class="jFiler-item-status"></div>\--}}
										{{--<div class="jFiler-item-thumb-overlay">\--}}
											{{--<div class="jFiler-item-info">\--}}
												{{--<div style="display:table-cell;vertical-align: middle;">\--}}
													{{--<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\--}}
													{{--<span class="jFiler-item-others">{{fi-size2}}</span>\--}}
												{{--</div>\--}}
											{{--</div>\--}}
										{{--</div>\--}}
										{{--{{fi-image}}\--}}
									{{--</div>\--}}
									{{--<div class="jFiler-item-assets jFiler-row">\--}}
										{{--<ul class="list-inline pull-left">\--}}
											{{--<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\--}}
										{{--</ul>\--}}
										{{--<ul class="list-inline pull-right">\--}}
											{{--<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\--}}
										{{--</ul>\--}}
									{{--</div>\--}}
								{{--</div>\--}}
							{{--</div>\--}}
						{{--</li>',--}}
                                        {{--progressBar: '<div class="bar"></div>',--}}
                                        {{--itemAppendToEnd: false,--}}
                                        {{--canvasImage: true,--}}
                                        {{--removeConfirmation: true,--}}
                                        {{--_selectors: {--}}
                                            {{--list: '.jFiler-items-list',--}}
                                            {{--item: '.jFiler-item',--}}
                                            {{--progressBar: '.bar',--}}
                                            {{--remove: '.jFiler-item-trash-action'--}}
                                        {{--}--}}
                                    {{--},--}}
                                    {{--dragDrop: {--}}
                                        {{--dragEnter: null,--}}
                                        {{--dragLeave: null,--}}
                                        {{--drop: null,--}}
                                        {{--dragContainer: null,--}}
                                    {{--},--}}
                                    {{--uploadFile: {--}}
                                        {{--url: "./php/ajax_upload_file.php",--}}
                                        {{--data: null,--}}
                                        {{--type: 'POST',--}}
                                        {{--enctype: 'multipart/form-data',--}}
                                        {{--synchron: true,--}}
                                        {{--beforeSend: function(){},--}}
                                        {{--success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){--}}
                                            {{--var parent = itemEl.find(".jFiler-jProgressBar").parent(),--}}
                                                    {{--new_file_name = JSON.parse(data),--}}
                                                    {{--filerKit = inputEl.prop("jFiler");--}}

                                            {{--filerKit.files_list[id].name = new_file_name;--}}

                                            {{--itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){--}}
                                                {{--$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");--}}
                                            {{--});--}}
                                        {{--},--}}
                                        {{--error: function(el){--}}
                                            {{--var parent = el.find(".jFiler-jProgressBar").parent();--}}
                                            {{--el.find(".jFiler-jProgressBar").fadeOut("slow", function(){--}}
                                                {{--$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");--}}
                                            {{--});--}}
                                        {{--},--}}
                                        {{--statusCode: null,--}}
                                        {{--onProgress: null,--}}
                                        {{--onComplete: null--}}
                                    {{--},--}}
                                    {{--files: null,--}}
                                    {{--addMore: false,--}}
                                    {{--allowDuplicates: true,--}}
                                    {{--clipBoardPaste: true,--}}
                                    {{--excludeName: null,--}}
                                    {{--beforeRender: null,--}}
                                    {{--afterRender: null,--}}
                                    {{--beforeShow: null,--}}
                                    {{--beforeSelect: null,--}}
                                    {{--onSelect: null,--}}
                                    {{--afterShow: null,--}}
                                    {{--onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){--}}
                                        {{--var filerKit = inputEl.prop("jFiler"),--}}
                                                {{--file_name = filerKit.files_list[id].name;--}}

                                        {{--$.post('./php/ajax_remove_file.php', {file: file_name});--}}
                                    {{--},--}}
                                    {{--onEmpty: null,--}}
                                    {{--options: null,--}}
                                    {{--dialogs: {--}}
                                        {{--alert: function(text) {--}}
                                            {{--return alert(text);--}}
                                        {{--},--}}
                                        {{--confirm: function (text, callback) {--}}
                                            {{--confirm(text) ? callback() : null;--}}
                                        {{--}--}}
                                    {{--},--}}
                                    {{--captions: {--}}
                                        {{--button: "Choose Files",--}}
                                        {{--feedback: "Choose files To Upload",--}}
                                        {{--feedback2: "files were chosen",--}}
                                        {{--drop: "Drop file here to Upload",--}}
                                        {{--removeConfirmation: "Are you sure you want to remove this file?",--}}
                                        {{--errors: {--}}
                                            {{--filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",--}}
                                            {{--filesType: "Only Images are allowed to be uploaded.",--}}
                                            {{--filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",--}}
                                            {{--filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."--}}
                                        {{--}--}}
                                    {{--}--}}
                                {{--});--}}
                            {{--})--}}

                        </script>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
