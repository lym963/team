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
							<li class="active">客户列表</li>
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
														<th>客户名称</th>
														<th>客户级别</th>
														<th>从事行业</th>
														<th>客户来源</th>
														<th>业务员名称</th>
														<th>客户电话</th>
														<th>客户手机</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													@foreach($data as $v)
													<tr>
														<td>{{$v->client_id}}</td>
														<td>{{$v->client_name}}</td>
														<td>
															@if($v->client_rank==1)一级客户@endif
															@if($v->client_rank==2)二级客户@endif
															@if($v->client_rank==3)三级客户@endif
														</td>
														<td>{{$v->client_work}}</td>
														<td>{{$v->client_source}}</td>
														<td>{{$v->sell_name}}</td>
														<td>{{$v->client_phone}}</td>
														<td>{{$v->client_tel}}</td>
														<td>
															<a href="{{url('client/edit/'.$v->client_id)}}">编辑</a>
															<a href="{{url('client/destroy/'.$v->client_id)}}">删除</a>
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