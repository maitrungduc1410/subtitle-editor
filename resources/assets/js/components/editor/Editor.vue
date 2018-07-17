<template>
	<div class="editor">
		<Navbar></Navbar>
		<div class="subtitle">
			<el-row>
				<el-col :span="16" class="subtitle-display">
					<el-row class="subtitle-header">
						<el-col :span="2" class="subtitle-header-item">
							<b>Line</b>
						</el-col>
						<el-col :span="3" class="subtitle-header-item">
							<b>Start</b>
						</el-col>
						<el-col :span="3" class="subtitle-header-item">
							<b>End</b>
						</el-col>
						<el-col :span="16" class="subtitle-header-item" style="display: initial;">
							<el-row style="display: flex;align-items: center;">
								<el-col :span="12">
									<b>Text</b>
								</el-col>
								<el-col :span="12">
									<el-input
										placeholder="Search subtitle..."
									    suffix-icon="el-icon-search" size="mini">
									</el-input>
								</el-col>
							</el-row>
						</el-col>
					</el-row>
					<el-row class="subtitle-content" data-simplebar>
						<el-row class="subtitle-content-row" v-for="n in 20" :key="n">
							<div @click="selectText('yeah, no kidding ' + n, $event)">
								<el-row class="subtitle-content-container">
									<el-col :span="2" class="subtitle-content-item">
									{{ n % 2 == 0 ? 'A' : (n % 3 == 0 ? 'B' : 'C') }}.111
									</el-col>
									<el-col :span="3" class="subtitle-content-item">
										00:04:43.267
									</el-col>
									<el-col :span="3" class="subtitle-content-item">
										00:06:22.112
									</el-col>
									<el-col :span="16" class="subtitle-content-item">
										<div>yeah, no kidding {{ n }}</div>
									</el-col>
								</el-row>
							</div>
						</el-row>
					</el-row>
				</el-col>
				<el-col :span="8" class="subtitle-visualizer">
					<div class="subtitle-visualizer-container">
						<div class="canvas-subtitle">
							<canvas id="canvas-playback"></canvas>
						</div>
						<div class="playback-tracker">
							<div class="block">
							    <el-slider v-model="value1"></el-slider>
							</div>
						</div>
						<div class="playback-actions">
							<el-row style="display: flex;">
								<el-col :span="2">
									<i class="fal fa-play" @click="playAudio"></i>
								</el-col>
								<el-col :span="2">
									<i class="fal fa-pause" @click="pauseAudio"></i>
								</el-col>
								<el-col :span="2">
									<i class="fal fa-backward"></i>
								</el-col>
								<el-col :span="2">
									<i class="fal fa-forward"></i>
								</el-col>
								<el-col :span="6" class="timestamps">
									00:04:03 / 00:08:05
								</el-col>
								<el-col :span="3" :offset="1">
									<el-select size="small" placeholder="1.0">
										<el-option-group label="Speed">
										    <el-option value="0.25"></el-option>
										    <el-option value="0.5"></el-option>
										    <el-option value="0.75"></el-option>
										    <el-option value="1"></el-option>
										    <el-option value="1.25"></el-option>
										    <el-option value="1.5"></el-option>
										    <el-option value="1.75"></el-option>
										    <el-option value="2"></el-option>
										</el-option-group>
									</el-select>
								</el-col>
								<el-col :span="2">
									<i class="fal fa-volume-up"></i>
								</el-col>
								<el-col :span="4">
									<el-slider v-model="value1"></el-slider>
								</el-col>
							</el-row>
						</div>
					</div>
				</el-col>
			</el-row>
		</div>
		<div class="audio-visualizer">
			<div class="visualizer-header">
				<el-row>
					<el-col :span="20" :offset="4" style="border-left: solid 1px #e9eaec;">
						<div id="wave-timeline1"></div>
					</el-col>
				</el-row>
			</div>
			<div class="list-audios" data-simplebar>
				<el-row class="audio-item">
					<el-col :span="4" class="audio-item-container">
						<div class="audio-info">
							PersonASpeech.wav
						</div>
					</el-col>
					<el-col :span="20">
						
						<div id="waveform1"></div>
					</el-col>
				</el-row>
				<el-row class="audio-item">
					<el-col :span="4" class="audio-item-container">
						<div class="audio-info">
							PersonBSpeech.wav
						</div>
					</el-col>
					<el-col :span="20">
						<div id="waveform2"></div>
					</el-col>
				</el-row>
				<el-row class="audio-item">
					<el-col :span="4" class="audio-item-container">
						<div class="audio-info">
							PersonCSpeech.wav
						</div>
					</el-col>
					<el-col :span="20">
						<div id="waveform3"></div>
					</el-col>
				</el-row>
			</div>
			<div class="block-zoom">
				<el-row>
					<el-col :span="4" style="border-right: solid 1px #e9eaec;">
						<el-row style="padding: 5px; display: flex; align-items: center;">
							<el-col :span="12">
								<el-button size="small" icon="el-icon-zoom-in" circle></el-button>
								<el-button size="small" icon="el-icon-zoom-out" circle></el-button>
							</el-col>
							<el-col :span="12">
								<el-slider v-model="value1" @change="changeZoom"></el-slider>
							</el-col>
						</el-row>
					</el-col>
				</el-row>
			</div>
		</div>
		<div class="input-section">
			<el-row style="display: flex;">
				<el-col :span="4" class="time-detail">
						Start: 04:06:08
					<br>
						End: 04:06:08
				</el-col>
				<el-col :span="12">
					<el-input
					  type="textarea"
					  :rows="3"
					  placeholder="Please input">
					</el-input>
				</el-col>
				<el-col :span="2" class="btn-input-actions">
						<el-button size="small" type="primary" round>Save</el-button>
					<br>
						<el-button size="small" type="danger" round>Cancel</el-button>
				</el-col>
			</el-row>
		</div>
	</div>
</template>

<script>
	import Navbar from '../common/Navbar.vue'
  	export default {
  		components: {
  			Navbar
  		},
  		data() {
			return {
				text: '',
				lastTextSelected: {},
				value1: 0,
				wavesurfer1: {},
				wavesurfer2: {},
				wavesurfer3: {}
			}
		},
		mounted() {
			this.wavesurfer1 = WaveSurfer.create({
			    container: '#waveform1',
			    waveColor: '#A8DBA8',
			    cursorColor: '#409EFF',
			    progressColor: '#3B8686',
			    height: 80,
			    plugins: [
		            WaveSurfer.regions.create({
		                regions: [
		                    {
		                        start: 23,
		                        end: 87,
		                        color: 'hsla(200, 50%, 70%, 0.4)'
		                    }
		                ],
		                dragSelection: {
		                    slop: 5
		                }
		            }),
		            WaveSurfer.timeline.create({
		                container: '#wave-timeline1'
		            })
		        ]
			});
			this.wavesurfer2 = WaveSurfer.create({
			    container: '#waveform2',
			    waveColor: '#A8DBA8',
			    progressColor: '#3B8686',
			    cursorColor: '#409EFF',
			    height: 80,
			    plugins: [
			    	// WaveSurfer.timeline.create({
		      //           container: '#wave-timeline2'
		      //       })
			    ]
			});
			this.wavesurfer3 = WaveSurfer.create({
			    container: '#waveform3',
			    waveColor: '#A8DBA8',
			    progressColor: '#3B8686',
			    cursorColor: '#409EFF',
			    height: 80,
			    plugins: [
			    	// WaveSurfer.timeline.create({
		      //           container: '#wave-timeline2'
		      //       })
			    ]
			});

			this.wavesurfer1.load('/music/NoiNayCoAnh-SonTungMTP-4772041.mp3')
			this.wavesurfer2.load('/music/EmOi-VuCatTuong-4767367.mp3')
			this.wavesurfer3.load('/music/EmOi-VuCatTuong-4767367.mp3')

			var canvas = document.getElementById('canvas-playback')

			canvas.width = 2000;
			canvas.height = 1125;
			canvas.style.width = "100%";
			canvas.style.height = "100%";
			canvas.getContext('2d').scale(3.5, 3.5)

			var ctx = canvas.getContext("2d")

			ctx.fillStyle = "black"
			ctx.fillRect(0, 0, canvas.width, canvas.height)

			ctx.font = "30px Helvetica Neue"
			ctx.fillStyle = "white"
			ctx.textAlign = "center"
			ctx.fillText("Hello, how are you", 200, 200)
		},
		methods: {
			selectText(text, event) {
				if(this.lastTextSelected.style) {
					this.lastTextSelected.style.border = ''
					this.lastTextSelected.childNodes[0].style.color = 'inherit'
					this.lastTextSelected.childNodes[0].style.background = 'inherit'
				}
				
				event.target.parentElement.parentElement.parentElement.style.border = 'dashed 1px'
				event.target.parentElement.parentElement.style.color = 'white'
				event.target.parentElement.parentElement.style.background = '#409EFF'
				this.text = text
				this.lastTextSelected = event.target.parentElement.parentElement.parentElement
			},
			changeZoom(value) {
				// console.log(value)
				this.wavesurfer1.zoom(value)
				this.wavesurfer2.zoom(value)
				this.wavesurfer3.zoom(value)
			},
			playAudio() {
				this.wavesurfer1.play()
			},
			pauseAudio() {
				this.wavesurfer1.pause()
			}
		}
  	}
</script>

<style lang="scss" scoped>
	.editor {
		.subtitle {
			padding: 10px;
			.subtitle-display {
				border: solid 1px #bbb;
				border-radius: 4px;
				transition: .2s;
				&:hover {
				    border-color: #409EFF;
				}
				.subtitle-header {
					text-align: left;
					border-bottom: solid 1px #bbb;
					display: flex;
					.subtitle-header-item:not(:last-child) {
						border-right: solid 1px #bbb;
					}
					.subtitle-header-item {
						padding: 5px;
						display: flex;
					    align-items: center;
					}
				}
				.subtitle-content {
					text-align: left;
					background: white;
					height: 300px;
					.subtitle-content-row {
						cursor: pointer;
						transition: 200ms;
						&:hover {
							color: white;
						    background: rgba(64, 158, 255, 0.81);
						}
						.subtitle-content-container {
							display: flex;
						}
						.subtitle-content-item {
							padding: 5px;
						}
						.subtitle-content-item:not(:last-child) {
							border-right: solid 1px #f7f7f7;
						}
					}
					.subtitle-content-row:not(:last-child) {
						border-bottom: solid 1px #f7f7f7;
					}
				}
			}
			.subtitle-visualizer {
				padding-left: 10px;
				.subtitle-visualizer-container {
					background: white;
					border: solid 1px #e9eaec;
					border-radius: 4px;
					transition: 200ms ease;
					&:hover {
						border-color: #409EFF;
					}
					.canvas-subtitle {
						canvas {
							width: 100%;
							border-top-left-radius: 4px;
							border-top-right-radius: 4px;
						}
					}
					.playback-tracker {
						.block {
							padding: 0 10px;
						}
					}
					.playback-actions {
						.el-col:not(:last-child) {
							text-align: center;
							display: flex;
						    align-items: center;
						    justify-content: center;
						    i {
						    	transition: 200ms ease;
						    	cursor: pointer;
						    	&:hover {
						    		color: #409EFF;
						    	}
						    }
						}
						.el-col:last-child {
						    padding-right: 10px;
						}
						.timestamps {
							font-size: 13px;
							font-weight: bold;
							display: flex;
							align-items: center;
						}
					}
				}
			}
		}
		.audio-visualizer {
			background-color: white;
			margin: 0 10px 10px 10px;
			border: solid 1px #e9eaec;
			transition: 200ms;
			border-radius: 4px;
			&:hover {
				border-color: #409EFF;
			}
			.list-audios {
				.audio-item {
					border-bottom: solid 1px #e9eaec;
				}
				.audio-item {
					display: flex;
					&>div {
						border-right: solid 1px #e9eaec;
					}
					.audio-item-container {
						display: flex;
					    align-items: center;
						.audio-info {
					    	width: 100%;
    						text-align: center;
					    }
					}
				}
			}
			.visualizer-header {
				border-bottom: solid 1px #e9eaec;
			}
		}
		.input-section {
			// background-color: white;
			margin: 0 10px 10px 10px;
			transition: 200ms;
			.time-detail {
				background: white;
				display: flex;
			    align-items: center;
			    justify-content: center;
			    border: solid 1px #e9eaec;
			    border-radius: 4px;
			    line-height: 25px;
			}
			.btn-input-actions {
			    justify-content: center;
		        align-items: center;
			    line-height: 35px;
			    text-align: center;
			    padding: 0 10px;
			    button {
			    	width: 100%;
			    }
			}
		}
	}
</style>