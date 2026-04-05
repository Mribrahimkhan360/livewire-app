<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap');

        .roles-wrap {
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

        .roles-table {
            width: 100%;
            border-collapse: collapse;
        }

        .roles-table thead tr {
            background: #faf9f7;
            border-bottom: 1px solid #ebe8e3;
        }

        .roles-table thead th {
            padding: 0.9rem 1.2rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 600;
            color: #9a9690;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .roles-table tbody tr {
            border-bottom: 1px solid #f2f0ec;
            transition: background 0.15s;
        }

        .roles-table tbody tr:last-child { border-bottom: none; }
        .roles-table tbody tr:hover { background: #faf9f7; }

        .roles-table td {
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

        .role-name {
            font-weight: 500;
            color: #2c2c2c;
        }

        .perm-badge {
            display: inline-block;
            background: #eef1f8;
            color: #3a5a9a;
            border: 1px solid #c8d4ee;
            font-size: 0.68rem;
            font-weight: 600;
            padding: 2px 9px;
            border-radius: 20px;
            margin: 2px 2px 2px 0;
            letter-spacing: 0.03em;
        }

        .no-perms {
            color: #c5c1bb;
            font-size: 0.8rem;
            font-style: italic;
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

    <div class="roles-wrap">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <div class="page-title">Roles</div>
            </div>

            <a href="{{ route('roles.create') }}" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-gray-500 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-md shadow-brand-600/30 transition-all duration-200 hover:scale-105">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Add Role
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
            <table class="roles-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($roles as $key => $role)
                    <tr>
                        <td class="row-num">{{ $key + 1 }}</td>
                        <td class="role-name">{{ $role->name }}</td>
                        <td>
                            @forelse($role->permissions as $permission)
                                <span class="perm-badge">{{ $permission->name }}</span>
                            @empty
                                <span class="no-perms">No permissions</span>
                            @endforelse
                        </td>
                        <td>
                            <div class="action-cell">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn-edit">Edit</a>
                                @can('delete')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                      style="margin:0" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#c5c1bb" stroke-width="1.5" style="display:block;margin:0 auto 0.75rem"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                                No roles found.
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
