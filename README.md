# Testing - [Ivy Dekker](https://github.com/ivydk)

## Test plan A
**As an administrative assistant I want to check the order status so that I can check if the planning is intact.** 

### Acceptance criteria:
- There is an index page with all the current orders, per production line.
- The order status is displayed.
- Production worker needs to be able to set the order status (start, finished).

### Happy path
3. The administrative assistant is on the orders index page
4. They can click on a current order
5. They go to the current order show page
6. They can see the order status

### Unhappy path
1. The administrative assistant is on the orders index page
2. They can click on a current order
3. The order they clicked on is not in the system
4. They get redirected to a 404 page

### System test

### Unit test

## Test plan B
**As a production worker I want to have an error button so that I can add the error to the backlog when an error occurs**

### Acceptance criteria 
- There must be an error button on the order show page.
- The error button will go to a new page with a form to add an error to the order.
- The error button will be disabled if the order is finished.
- The error button will be disabled if the order is not started.
- The time of the occurred error is automatically calculated.
- The error is added to the backlog.

### Happy path

### Unhappy path

