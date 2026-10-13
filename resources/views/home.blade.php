<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新聞配達管理システム</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- 左側：ダークサイドメニュー（バナー） -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex flex-shrink-0">
            <div>
                <!-- ロゴ・タイトルエリア -->
                <div class="p-5 border-b border-slate-800">
                    <h1 class="text-white font-bold text-lg flex items-center gap-2">
                        <span>📰</span> 新聞配達管理システム
                    </h1>
                    <p class="text-xs text-slate-400 mt-1">~ つなぐ、届ける、安心を ~</p>
                </div>

                <!-- ナビゲーションメニュー -->
                <nav class="p-4 space-y-1">
                    <a href="{{route('home')}}" class="flex items-center gap-3 px-4 py-3 bg-blue-600 text-white rounded-lg font-medium text-sm">
                        <span>🏠</span> ホーム
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>📍</span> 今日の順路
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>🗺️</span> エリア管理
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>👥</span> 配達員管理
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>🏠</span> 配達先管理
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>📄</span> 新聞の種類
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>🕒</span> 変更履歴
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 rounded-lg text-sm transition">
                        <span>⚙️</span> 設定
                    </a>
                </nav>
            </div>

            <!-- サイドバー下部の販売店情報 -->
            <div class="p-4 border-t border-slate-800 text-xs text-slate-400">
                <p class="text-white font-medium truncate">{{ auth()->user()->shop->name ?? 'サンプル販売店' }}</p>
                <p class="mt-0.5 truncate">管理者：{{ auth()->user()->name }}</p>
            </div>
        </aside>

        <!-- 右側メインエリア -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- 上部ヘッダー（日付・天気・ユーザーメニュー） -->
            <header class="bg-white border-b border-gray-200 px-6 py-3 flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-1 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-200">
                        <span>📅</span> <span class="font-medium text-gray-800">2025年4月22日（火）</span>
                    </div>
                    <div class="flex items-center gap-1 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-200">
                        <span>晴れ 18°C / 8°C</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button class="text-gray-500 hover:text-gray-700 text-lg">🔔</button>
                    <div class="flex items-center gap-2 border-l pl-4 border-gray-200">
                        <div class="w-8 h-8 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center">
                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="text-left">
                            <p class="text-xs font-bold text-gray-800">{{ auth()->user()->name }}</p>
                            <p class="text-[10px] text-gray-500">店長</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- コンテンツ本体 -->
            <main class="p-6 space-y-6">
                
                <!-- 上部4枚のカード -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">今日の配達員</p>
                            <p class="text-2xl font-black text-gray-800 mt-1">12 <span class="text-xs font-normal text-gray-500">名</span></p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-lg">👥</div>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">担当エリア</p>
                            <p class="text-2xl font-black text-gray-800 mt-1">6 <span class="text-xs font-normal text-gray-500">エリア</span></p>
                        </div>
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-lg">🗺️</div>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">配達先総数</p>
                            <p class="text-2xl font-black text-gray-800 mt-1">156 <span class="text-xs font-normal text-gray-500">件</span></p>
                        </div>
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-lg">🏠</div>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">本日の変更</p>
                            <p class="text-2xl font-black text-gray-800 mt-1">3 <span class="text-xs font-normal text-gray-500">件</span></p>
                        </div>
                        <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-lg">📝</div>
                    </div>
                </div>

                <!-- メイングリッド（地図 ＆ 右カラム） -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- 左側2カラム：地図と順路一覧 -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-bold text-gray-800 text-base">A地区（田中さんの順路）</h3>
                                <div class="flex gap-2">
                                    <span class="text-xs px-3 py-1 bg-gray-100 rounded border">A地区 ▼</span>
                                    <span class="text-xs px-3 py-1 bg-gray-100 rounded border">田中 健一 ▼</span>
                                </div>
                            </div>
                            <div class="bg-gray-100 h-80 rounded-lg flex items-center justify-center border border-gray-200">
                                <span class="text-gray-400 text-sm">Leaflet マップ表示エリア</span>
                            </div>
                        </div>
                    </div>

                    <!-- 右側1カラム：クイックメニューなど -->
                    <div class="space-y-6">
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-gray-800 text-sm mb-3">クイックメニュー</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <button class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-xs text-center font-medium text-gray-700 border border-gray-200 transition">
                                    ＋ 新規配達先の登録
                                </button>
                                <button class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-xs text-center font-medium text-gray-700 border border-gray-200 transition">
                                    🗺️ 順路を編集
                                </button>
                                <button class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-xs text-center font-medium text-gray-700 border border-gray-200 transition">
                                    👥 配達員の管理
                                </button>
                                <button class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg text-xs text-center font-medium text-gray-700 border border-gray-200 transition">
                                    ⚙️ 設定
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
        </div>

    </div>
</body>
</html>
