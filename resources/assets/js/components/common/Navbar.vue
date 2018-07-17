<template>
	<div class="navbar">
		<div class="header-menu">
			<div class="header-nav-trigger">
				<i class="fa fa-bars"></i>
			</div>
		</div>
		<div class="header-project-name">
			<div class="project-name">
				<h3 style="font-weight: 400;">Project 1</h3>		
			</div>
		</div>
		<div class="list-functions">
			<div class="functions-container">
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>F</span>ile
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>E</span>dit
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>F</span>ormat
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>V</span>iew
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>T</span>ools
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>S</span>ettings
						</div>
					</div>
				</div>
				<div class="function-item">
					<div class="function-item-container">
						<div class="function-name">
							<span>H</span>elp
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {

	}
</script>

<style lang="scss" scoped>
	.navbar {
		height: 45px;
		width: 100%;
		// position: absolute;
		// top: 0;
		// left: 0;
	    transition: all 200ms ease;
	    display: flex;
	    border-bottom: 1px solid #e9eaec;
        background: #fff;
	    .header-menu {
	    	margin: 0;
		    padding: 0;
		    border: 0;
		    font: inherit;
		    vertical-align: baseline;
	    	.header-nav-trigger {
    		    height: 45px;
			    width: 45px;
			    display: flex;
			    -webkit-box-pack: center;
			    -ms-flex-pack: center;
			    justify-content: center;
			    -webkit-box-align: center;
			    -ms-flex-align: center;
			    align-items: center;
			    border-right: 1px solid #e9eaec;
			    cursor: pointer;

	    	}
	    }
	    .header-project-name {
		    display: flex;
		    align-items: center;
		    padding: 1.5rem;
	    }
	    .list-functions {
		    display: flex;
		    align-items: center;
		    height: 45px;
		    border-left: 1px solid #e9eaec;
		    .functions-container {
			    display: flex;
			    padding: 0 1.5rem;
			    .function-item {
			    	.function-item-container {
			    		transition: 200ms ease;
			    		padding: .5rem;
			    		border-radius: 5px;
			    		cursor: pointer;
			    		&:hover {
				    		background-color: #f4f4f4;
				    	}
			    	}
			    	.function-name {
			    		opacity: 0.75;
			    		span {
			    			text-decoration: underline;
			    		}
			    	}
			    }
			    .function-item:not(:first-child) {
			    	padding-left: 1rem;
			    }
		    }
	    }
	}
</style>