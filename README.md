# progressbar
ウェブ・アプリケーションにおいて、クライアント側で提出したものを
ベースにサーバー側にバッチ処理を行うことがよくあると思う。

この時に、サーバー側での処理進捗をクライアントにリアルタイムで表示するのが普通。

このプログラムは php + javascript+ python + shell で
サーバーの処理をprogress barで表示するプログラムである。


php, javascript: 情報提出, 処理結果の表示
shell: バッチ処理
python: logfileの監視、複数スクリプトの並列処理
