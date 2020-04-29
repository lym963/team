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
							<li class="active">管理员添加</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">
									
									<form class="form-horizontal" role="form" action="{{url('admin/store')}}" method="post">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="admin_name" placeholder="请输入管理员名称 " class="col-xs-10 col-sm-5" />
											<span style="color:red">{{$errors->first('admin_name')}}</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 管理员密码 </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" name="admin_pwd" placeholder="请输入管理员密码" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">管理员角色</label>

										<div class="col-sm-9">
											<input type="radio" id="form-field-2" name="admin_role"  value="1" checked/>系统管理员
											<input type="radio" id="form-field-2" name="admin_role"  value="2"/>主管
											<input type="radio" id="form-field-2" name="admin_role"  value="3"/>业务员
											<input type="radio" id="form-field-2" name="admin_role"  value="4"/>客户
										</div>
									</div>
									<div class="space-4"></div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												增加
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