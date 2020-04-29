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
							<li class="active">客户修改</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">
									
									<form class="form-horizontal" role="form" action="{{url('/client/update/'.$data->client_id)}}" method="post">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" value="{{$data->client_name}}" name="client_name" class="col-xs-10 col-sm-5" />
											<span style="color:red">{{$errors->first('client_name')}}</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 客户级别 </label>

										<div class="col-sm-9">
											<input type="radio" name="client_rank" value="1" @if($data->client_rank==1) checked @endif>一级客户
											<input type="radio" name="client_rank" value="2" @if($data->client_rank==2) checked @endif>二级客户
											<input type="radio" name="client_rank" value="3" @if($data->client_rank==3) checked @endif>三级客户
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">从事行业</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" class="col-xs-10 col-sm-5" name="client_work" value="{{$data->client_work}}"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">客户来源</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" value="{{$data->client_source}}" name="client_source" class="col-xs-10 col-sm-5"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">业务员ID</label>

										<div class="col-sm-9">
										<select name="sell_id" id="">
                                            <option value="">--请选择--</option>
											@foreach($sell as $vv)
											<option value="{{$vv->sell_id}}" @if($data->sell_id==$vv->sell_id) selected @endif>{{$vv->sell_name}}</option>
											@endforeach
										</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">客户电话</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" value="{{$data->client_phone}}" name="client_phone" class="col-xs-10 col-sm-5"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">客户手机</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" value="{{$data->client_tel}}" name="client_tel" class="col-xs-10 col-sm-5"/>
										</div>
									</div>

									<div class="space-4"></div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-info" type="button">
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

@endsection