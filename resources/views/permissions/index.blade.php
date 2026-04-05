<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap');

        .perms-wrap {
            font-family: 'DM Sans', sans-serif;
            padding: 2rem;
            /*background: #f7f5f2;*/
            min-height: 100vh;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2rem;
        }

        /*.page-title {*/
        /*    font-family: 'Playfair Display', serif;*/
        /*    font-size: 1.75rem;*/
        /*    color: #2c2c2c;*/
        /*    letter-spacing: -0.02em;*/
        /*    margin: 0;*/
        /*}*/

        .page-subtitle {
            font-size: 0.8rem;
            color: #9a9690;
            margin-top: 2px;
            font-weight: 400;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #3d6b58;
            color: #fff;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(61,107,88,0.18);
        }

        .btn-create:hover {
            background: #2f5343;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(61,107,88,0.28);
        }

        .flash-success {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding: 0.9rem 1.2rem;
            background: #edf6f1;
            border-left: 3px solid #3d6b58;
            border-radius: 8px;
            color: #2f5343;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .flash-close {
            background: none;
            border: none;
            cursor: pointer;
            color: #3d6b58;
            padding: 0;
            line-height: 1;
            opacity: 0.6;
            transition: opacity 0.15s;
        }

        .flash-close:hover { opacity: 1; }

        .table-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #ebe8e3;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.05);
        }

        .perms-table {
            width: 100%;
            border-collapse: collapse;
        }

        .perms-table thead tr {
            background: #faf9f7;
            border-bottom: 1px solid #ebe8e3;
        }

        .perms-table thead th {
            padding: 0.9rem 1.2rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 600;
            color: #9a9690;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .perms-table tbody tr {
            border-bottom: 1px solid #f2f0ec;
            transition: background 0.15s;
        }

        .perms-table tbody tr:last-child { border-bottom: none; }
        .perms-table tbody tr:hover { background: #faf9f7; }

        .perms-table td {
            padding: 0.9rem 1.2rem;
            font-size: 0.85rem;
            color: #4a4844;
            vertical-align: middle;
        }

        .row-num {
            color: #c5c1bb;
            font-size: 0.78rem;
            font-weight: 500;
        }

        .perm-name-badge {
            display: inline-block;
            background: #fdf6e8;
            color: #8a5e20;
            border: 1px solid #f0dfa8;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 6px;
            letter-spacing: 0.02em;
        }

        .guard-badge {
            display: inline-block;
            background: #f2f0ec;
            color: #7a776f;
            border: 1px solid #e2dfd8;
            font-size: 0.72rem;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 6px;
            letter-spacing: 0.03em;
        }

        .date-text {
            color: #9a9690;
            font-size: 0.8rem;
            font-variant-numeric: tabular-nums;
        }

        .action-cell {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .btn-edit {
            display: inline-block;
            background: #fef8ec;
            color: #a07830;
            border: 1px solid #f0dfa8;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-edit:hover {
            background: #fdf0d0;
            border-color: #e0c070;
        }

        .btn-delete {
            display: inline-block;
            background: #fef0f0;
            color: #c0392b;
            border: 1px solid #f5c6c6;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-delete:hover {
            background: #fde0de;
            border-color: #e09090;
        }

        .empty-state {
            text-align: center;
            padding: 3.5rem 1rem;
            color: #b0ada8;
            font-size: 0.875rem;
        }
    </style>

    <div class="perms-wrap">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <h1 class="page-title">Permissions</h1>
            </div>

            <a href="{{ route('permissions.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-gray-500 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-md shadow-brand-600/30 transition-all duration-200 hover:scale-105">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Add Permission
            </a>

        </div>

        {{-- Flash --}}
        @if(session('success'))
            <div class="flash-success">
                <span style="display:flex;align-items:center;gap:10px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    {{ session('success') }}
                </span>
                <button class="flash-close" onclick="this.closest('.flash-success').style.display='none'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
        @endif

        {{-- Table --}}
        <div class="table-card">
            <table class="perms-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Permission Name</th>
{{--                    <th>Guard</th>--}}
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($permissions as $key => $permission)
                    <tr>
                        <td class="row-num">{{ $key + 1 }}</td>
                        <td><span class="perm-name-badge">{{ $permission->name }}</span></td>
{{--                        <td><span class="guard-badge">{{ $permission->guard_name }}</span></td>--}}
                        <td class="date-text">{{ $permission->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="action-cell">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}"
                                      method="POST" style="margin:0"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#c5c1bb" stroke-width="1.5" style="display:block;margin:0 auto 0.75rem"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                                No permissions found.
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
