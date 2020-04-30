@extends('layouts.crm')
@section('content')
<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="{{url('/index')}}">首页</a>
							</li>
							<li class="active">客户拜访修改</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">
									
									<form class="form-horizontal" role="form" action="{{url('call/update/'.$callInfo->call_id)}}" method="post">
                                        @csrf
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">访问人</label>

										<div class="col-sm-9">
											<input type="input" id="form-field-2"  name="call_name" value="{{$callInfo->call_name}}"/>
											
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">访问地址</label>

										<div class="col-sm-9">
											<input type="input" id="form-field-2" name="call_site" value="{{$callInfo->call_site}}"/>
											
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">访问详情</label>

										<div class="col-sm-9">
										    <textarea name="call_desc" id='form-field-2' cols="30" rows="10"> {{$callInfo->call_desc}}</textarea>
											
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员名称 </label>

										<div class="col-sm-9">
											<select name="sell_id" >
                                                <option value="">--请选择--</option>
                                                @foreach($sell as $s)
                                                <option value="{{$s->sell_id}}" @if($callInfo->sell_id==$s->sell_id) selected @endif>{{$s->sell_name}}</option>
                                                @endforeach
                                            </select>
										</div>
									</div>                                
			
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 客户名称 </label>
                                            <div class="col-sm-9">
                                                <select name="client_id" >
                                                    <option value="">--请选择--</option>
                                                    @foreach($client as $c)
                                                    <option value="{{$c->client_id}}" @if($callInfo->client_id==$c->client_id) selected @endif>{{$c->client_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>

                                    
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">访问时间</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" class="time" value="{{$callInfo->call_time}}" name="call_time"/>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">下次访问时间</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" class="abc" name="next_time" value="{{$callInfo->next_time}}"/>
										</div>
									</div>
									<div class="space-4"></div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												修改
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>



								</form>
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
    <script src="/laydate/laydate.js"></script>
    <script>
    //执行一个laydate实例
    //时间选择器
    laydate.render({
    elem: '.time',type: 'datetime'
    });
    laydate.render({
    elem: '.abc',type: 'datetime'
    });
    </script>
@endsection