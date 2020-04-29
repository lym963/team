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
							<li class="active">管理员修改</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">
									
									<form class="form-horizontal" role="form" action="{{url('/admin/update/'.$data->admin_id)}}" method="post">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" value="{{$data->admin_name}}" name="admin_name" class="col-xs-10 col-sm-5" />
											<span style="color:red">{{$errors->first('admin_name')}}</span>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 管理员密码 </label>

										<div class="col-sm-9">
										<input type="password" id="form-field-1" value="{{$data->admin_pwd}}" name="admin_pwd" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 管理员角色 </label>

										<div class="col-sm-9">
											<input type="radio" name="admin_role" value="1" @if($data->admin_role==1) checked @endif>系统管理员
											<input type="radio" name="admin_role" value="2" @if($data->admin_role==2) checked @endif>主管
											<input type="radio" name="admin_role" value="3" @if($data->admin_role==3) checked @endif>业务员
											<input type="radio" name="admin_role" value="4" @if($data->admin_role==4) checked @endif>客户
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