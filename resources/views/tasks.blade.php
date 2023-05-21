
        <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="input" class="control-label">Title</label>

                <div style="color:red" >{{ $errors->first('title') }}</div>

                <div class="input">
                    <input type="text" name="title" id="title" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="input" class="control-label">Description</label>

                <div class="input">
                    <input type="text" name="description" id="description">
                </div>
            </div>

            <div class="form-group">
                <label for="input" class="control-label">End date</label>

                <div style="color:red">{{ $errors->first('endDate') }}</div>

                <div class="input">
                    <input type="date" name="endDate" id="endDate">
                </div>
            </div>

            <div class="form-group">
                <div class="btn">
                    <button type="submit" >
                        <i class=btn_i></i> Add task
                    </button>
                </div>
            </div>
            
        </form>
        
            @if (count($tasks) > 0)
            <div class=toDolist>
                <div class="heading">
                    Current Tasks
                </div>

                <div class="toDolist_body">
                    <table class="table">

                        
                        <thead>
                            
                            <th>&nbsp;</th>
                        </thead>

                
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                        <td class="table-text">
                                            <div id=allPost>{{ $task->title }}</div>
                                            <div id=allPost>{{ $task->description }}</div>
                                            <div id=allPost>
                                                <label>End date</label>
                                                {{ date("d.m.Y", strtotime($task->endDate)) }} 
                                            </div>

                                            <div id=allPost>
                                                <label>Created at</label>
                                                {{ date("d.m.Y H:i:s", strtotime($task->created_at)) }}
                                            </div>
                                        </td>

                                        <td>
                                        <div>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('get')
                                                <input type="checkbox" id="checkbox" name="checkbox" onClick='(function(){ window.location = "/completed/<?=$task->id?>"; })();'>
                                                <label for="checkbox">Done</label>
                                            </form>
                                        </div>

                                        <td>
                                            <form action="{{ url('update/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                                @method('get')
                                                <button type="submit" class="btn">
                                                    <i></i> Update
                                                </button>
                                            </form>
                                        </td>
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                                @method('get')
                                            <button type="submit" class="btn">
                                                <i></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                   
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
             @endif
        
    </div>

    


