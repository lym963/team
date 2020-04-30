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
							<li class="active">客户信息查询</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							

									<div class="col-xs-12">

									
									
										<div class="table-responsive">
                                            <form action="">
                                                <input type="text" name="client_name" placeholder="请输入客户名称"  @if(isset($search['client_name']))value="{{$search['client_name']}}"@endif>
                                                <input type="text" name="client_work" placeholder="从事行业" @if(isset($search['client_work']))value="{{$search['client_work']}}"@endif>
                                                客户等级:<select name="level" >
                                                    <option value="">--请选择--</option>
                                                    @for($i=1;$i<=3;$i++)
                                                    <option value="{{$i}}"  @if(isset($search['level'])) @if($search['level']==$i) selected @endif @endif>{{$i}}级客户</option>
                                                    @endfor
                                                </select>
                                                <input type="text" name="client_source" placeholder="客户来源" @if(isset($search['client_source']))value="{{$search['client_source']}}"@endif>
                                                业务员名称:<select name="sell_id">
                                                    <option value="">--请选择--</option>
                                                    @foreach($sell as $s)
                                                    <option value="{{$s->sell_id}}" @if(isset($search['sell_id']))  @if($search['sell_id']==$s->sell_id) selected @endif @endif>{{$s->sell_name}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="client_phone" placeholder="客户电话" @if(isset($search['client_phone']))value="{{$search['client_phone']}}"@endif>
                                                <input type="text" name="client_tel" placeholder="客户手机" @if(isset($search['client_tel']))value="{{$search['client_tel']}}"@endif>
                                                <button>搜索</button>
                                            </form>
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
													</tr>
													@endforeach
												</tbody>
											</table>
											<center>{{$data->appends($search)->links()}}</center>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

@endsection