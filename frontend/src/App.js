import React from 'react';
import BlockUi from 'react-block-ui';
import axios from 'axios';
import './App.css';
import 'react-block-ui/style.css';

class App extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			blocking: false,
			news: [],
		};
		this.BaseUrl = 'http://localhost:8000';
	}
	componentDidMount(){
		this.setState({
			blocking:true
		});
		const self = this;
		axios.get(this.BaseUrl + '/news')
		.then(function (response) {
			// handle success
			self.setState({
				blocking:false,
				news: response.data.objects
			});
		})
		.catch(function (error) {
			// handle error
			console.log(error);
			self.setState({
				blocking:false
			});
		});
	}
	onRefreshClicked = () => {
		this.setState({
			blocking:true
		});
		const self = this;
		axios.get(this.BaseUrl + '/refresh')
		.then(function (response) {
			// handle success
			self.setState({
				blocking:false,
				news: response.data.objects
			});
		})
		.catch(function (error) {
			// handle error
			console.log(error);
			self.setState({
				blocking:false
			});
		});
	}
	onLoadClicked = () => {
		this.setState({
			blocking:true
		});
		const self = this;
		axios.get(this.BaseUrl + '/scrapenews')
		.then(function (response) {
			// handle success
			self.setState({
				blocking:false,
				news: response.data.objects
			});
		})
		.catch(function (error) {
			// handle error
			console.log(error);
			self.setState({
				blocking:false
			});
		});
	}
	ondeleteClicked = (id) => {
		const self = this;
		axios.delete(this.BaseUrl + '/news/' + id)
		.then(function (response) {
			// handle success
			if(response.status = 202){
				const updatednews = self.state.news.filter((n) => {
					if(n.id !== id){
						return n;
					}
				});
				self.setState({
					news: updatednews
				});
			}
			self.setState({
				blocking:false
			});
		})
		.catch(function (error) {
			// handle error
			console.log(error);
			self.setState({
				blocking:false
			});
		});
	}
	render(){
		const rows = this.state.news.map((col) => {
			return (<tr key={col.id}>
				<td><a href={col.url} target="_blank">{col.title}</a></td>
				<td>{col.username}</td>
				<td className="text-right">
					<button className="btn btn-primary btn-sm" onClick={() => this.ondeleteClicked(col.id)}>delete</button>
				</td>
			</tr>);
		});
		return (
	    	<div className="container-fluid">
	    		<BlockUi tag="div" blocking={this.state.blocking}>
				    <div className="row top-space">
				        <div className="col-sm-3 col-xs-6">  
							<button className="btn btn-success btn-block" onClick={this.onLoadClicked}> Load </button>  
						</div>
						<div className="col-sm-3 col-xs-6">  
							<button className="btn btn-success btn-block" onClick={this.onRefreshClicked}> Refresh </button>  
						</div>
				     </div>
				     <div className="row">
				      	<div className="col-md-12">
				      		<div className="table-responsive">
				      			<table className="table table-striped">
									<thead>
										<tr>
											<th>Title</th>
											<th>Username</th>
											<th className="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										{rows}
									</tbody>
								</table>
				      		</div>
				      	</div>
				    </div>
		      	</BlockUi>
		    </div>
		  );		
	}
  
}

export default App;
