<style type="text/css">
	.icon {
		width: 30px;
		padding-right: 10px;
	}

	.iconb {
		width: 30px;
		padding-right: 10px;
	}

	.icon:hover {
		transition: 0.3s;
		/*box-shadow: 2px 0px 20px rgba(0, 0, 0, 0.8);*/
	}

	.sidebar-menu .livechat {
		background-color: #009999;
	}

</style>
<style>
	.msger {
		display: flex;
		flex-flow: column wrap;
		justify-content: space-between;
		width: 100%;
		max-width: 800px;
		margin: 25px 10px;
		height: calc(100% - 50px);
		border: var(--border);
		border-radius: 5px;
		background: var(--msger-bg);
		box-shadow: 0 15px 15px -5px rgba(0, 0, 0, 0.2);



	}

	.msger-header {
		display: flex;
		justify-content: space-between;
		padding: 10px;
		border-bottom: var(--border);
		background: #eee;
		color: #666;
	}

	.msger-chat {
		flex: 1;
		overflow-y: auto;
		padding: 10px;



	}

	.msger-chat::-webkit-scrollbar {
		width: 6px;
	}

	.msger-chat::-webkit-scrollbar-track {
		background: #ddd;
	}

	.msger-chat::-webkit-scrollbar-thumb {
		background: #bdbdbd;
	}

	.msg {
		display: flex;
		align-items: flex-end;
		margin-bottom: 10px;
	}

	.msg:last-of-type {
		margin: 0;
	}

	.msg-img {
		width: 50px;
		height: 50px;
		margin-right: 10px;
		background: #ddd;
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		border-radius: 50%;
	}

	.msg-bubble {
		max-width: 450px;
		padding: 15px;
		border-radius: 15px;
		background: var(--left-msg-bg);
	}

	.msg-info {
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 10px;
	}

	.msg-info-name {
		margin-right: 10px;
		font-weight: bold;
	}

	.msg-info-time {
		font-size: 0.85em;
	}

	.left-msg .msg-bubble {
		border-bottom-left-radius: 0;
	}

	.right-msg {
		flex-direction: row-reverse;
	}

	.right-msg .msg-bubble {
		background: var(--right-msg-bg);
		color: #fff;
		border-bottom-right-radius: 0;
	}

	.right-msg .msg-img {
		margin: 0 0 0 10px;
	}

	.msger-inputarea {
		display: flex;
		padding: 10px;
		border-top: var(--border);
		background: #eee;
	}

	.msger-inputarea * {
		padding: 10px;
		border: none;
		border-radius: 3px;
		font-size: 1em;
	}

	.msger-input {
		flex: 1;
		background: #ddd;
	}

	.msger-send-btn {
		margin-left: 10px;
		background: rgb(0, 196, 65);
		color: #fff;
		font-weight: bold;
		cursor: pointer;
		transition: background 0.23s;
	}

	.msger-send-btn:hover {
		background: rgb(0, 180, 50);
	}

	.msger-chat {
		background-color: #fcfcfe;
		background-image: url(https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png);
	}

	.btn-get-started {
		transition: 0.5s;
		line-height: 1;
		margin: 10px;
		color: #fff;
	}

	#comments {
		overflow: hidden
	}

</style>
