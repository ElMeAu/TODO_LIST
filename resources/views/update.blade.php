<form action="{{ url('update/'.$task->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <div style="color:red" >{{ $errors->first('title') }}</div>
                <div class="input">
                    <input type="text" name="title" id="task-name" value="{{ $task->title }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="input" class="control-label">Description</label>

                <div class="input">
                    <input type="text" name="description" id="description" value="{{$task->description}}">
                </div>
            </div>

            <div class="form-group">
                <label for="input" class="control-label">End date</label>

                <div style="color:red">{{ $errors->first('endDate') }}</div>

                <div class="input">
                    <input type="date" name="endDate" id="endDate" value='{{ date("Y-m-d", strtotime($task->endDate)) }}'>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input">
                    <button type="submit" class="btn">
                        <i class=></i> update
                    </button>
                </div>
            </div>
            
        </form>