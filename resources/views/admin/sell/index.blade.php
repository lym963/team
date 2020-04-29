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
							<li class="active">业务员列表</li>
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
														<th>业务员名称</th>
														<th>性别</th>
														<th>电话</th>
														<th>手机</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													@foreach($sellInfo as $v)
													<tr>
														<td>{{$v->sell_id}}</td>
														<td>{{$v->sell_name}}</td>
														<td>@if($v->sell_sex==1)男@else女@endif</td>
														<td>{{$v->sell_phone}}</td>
														<td>{{$v->sell_tel}}</td>
														<td>
														<a href="{{url('sell/edit/'.$v->sell_id)}}"><button class="btn">编辑</button></a>
														<a href="{{url('sell/destroy/'.$v->sell_id)}}"><button class="btn btn-danger">删除</button></a>
														</td>

													</tr>
												
													@endforeach																		
												</tbody>
											</table>
											{{$sellInfo->links()}}
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

@endsection