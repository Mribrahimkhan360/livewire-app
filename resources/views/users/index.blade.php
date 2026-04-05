<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap');

        .users-wrap {
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
            gap: 10px;
            margin-bottom: 1.5rem;
            padding: 0.9rem 1.2rem;
            background: #edf6f1;
            border-left: 3px solid #3d6b58;
            border-radius: 8px;
            color: #2f5343;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .table-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #ebe8e3;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.05);
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table thead tr {
            background: #faf9f7;
            border-bottom: 1px solid #ebe8e3;
        }

        .users-table thead th {
            padding: 0.9rem 1.2rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 600;
            color: #9a9690;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .users-table tbody tr {
            border-bottom: 1px solid #f2f0ec;
            transition: background 0.15s;
        }

        .users-table tbody tr:last-child {
            border-bottom: none;
        }

        .users-table tbody tr:hover {
            background: #faf9f7;
        }

        .users-table td {
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

        .user-name {
            font-weight: 500;
            color: #2c2c2c;
        }

        .user-email {
            color: #6e6b66;
        }

        .role-badge {
            display: inline-block;
            background: #edf3f0;
            color: #3d6b58;
            border: 1px solid #c8ddd5;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            margin: 2px 2px 2px 0;
            letter-spacing: 0.03em;
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

        .empty-state svg {
            display: block;
            margin: 0 auto 0.75rem;
            opacity: 0.35;
        }
    </style>

    <div class="users-wrap">

        {{-- Header --}}
        <div class="page-header">
            <div>
                <h1 class="page-title">Users</h1>
                <p class="page-subtitle">Manage accounts and roles</p>
            </div>
            <a href="{{ route('users.create') }}"
               class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-gray-500 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-md shadow-brand-600/30 transition-all duration-200 hover:scale-105">
                    + Add User
            </a>
        </div>

        {{-- Flash --}}
        @if(session('success'))
            <div class="flash-success">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="table-card">
            <table class="users-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <td class="row-num">{{ $key + 1 }}</td>
                        <td class="user-name">{{ $user->name }}</td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="role-badge">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="action-cell">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>
                                @can('delete')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this user?')"
                                      style="margin:0">
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
                        <td colspan="5">
                            <div class="empty-state">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#9a9690" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                No users found.
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
