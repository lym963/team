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
							<li class="active">管理员列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">

									
									
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>管理员名称</th>
														<th>管理员角色</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													@foreach($data as $v)
													<tr>
														<td>{{$v->admin_id}}</td>
														<td>{{$v->admin_name}}</td>
														<td>
															@if($v->admin_role==1)系统管理员@endif
															@if($v->admin_role==2)主管@endif
															@if($v->admin_role==3)业务员@endif
															@if($v->admin_role==4)客户@endif
														</td>
														<td>
															<a href="{{url('admin/edit/'.$v->admin_id)}}">编辑</a>
															<a href="{{url('admin/destroy/'.$v->admin_id)}}">删除</a>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
											<center>{{$data->links()}}</center>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

@endsection