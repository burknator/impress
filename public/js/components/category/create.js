import React from 'react';

class CreateCategory extends React.Component
{
    render() {
        return <p>Hello World!</p>;
    }
}

class Test {
    setState(state) {
        this.state = state;
    }

    render(node) {
        React.render(<CreateCategory />, node);
    }
}

var test = new Test();

export default test;
