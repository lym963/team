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
							<li class="active">业务员修改</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">
									
									<form class="form-horizontal" role="form" action="{{url('sell/store')}}" method="post">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员名称 </label>
										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="业务员名称 " class="col-xs-10 col-sm-5" name="sell_name" />
										</div>
										<span><font color='red'>{{$errors->first('sell_name')}}</font></span>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 业务员性别 </label>

										<div class="col-sm-9">
											<input type="radio" name="sell_sex" value="1" checked/>男
											<input type="radio" name="sell_sex" value="2"/>女
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">业务员电话</label>

										<div class="col-sm-9">
											<input type="input" id="form-field-2"  placeholder="业务员电话 " name="sell_phone"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">业务员手机</label>
										
										<div class="col-sm-9">
											<input type="tel" id="form-field-2"  placeholder="业务员手机 " name="sell_tel"/>
											
										</div>
										<span><font color='red'>{{$errors->first('sell_tel')}}</font></span>
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