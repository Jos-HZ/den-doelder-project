
# Testing - [Ivy Dekker](https://github.com/ivydk)
## Test plan A
- --
**<i>As a production worker I want to have an error button so that I can add the error to the backlog when an error occurs</i>**

### Acceptance criteria 
- There must be an error button on the order show page.
- The error button will go to a new page with a form to add an error to the order.
- The error button will be disabled if the order is finished.
- The time of the occurred error is automatically calculated.
- The error is added to the backlog.

### Happy path
1. The production worker is on the production line show page 
2. They click the order that they are making 
3. The order show page is shown 
4. They can click on the error button 
5. They go to the backlog create page 
6. They can fill in the form 
7. The production worker submits the form 
8. The error is added to the backlog 
9. The order show page is shown

### Unhappy path
1. The production worker is on the production line index page
2. They click the order that they are making
3. The order show page is shown
4. They can click on the error button
5. They go to the backlog create page
6. They can fill in the form
7. The production worker fills in the form incorrectly
8. The production worker submits the form
9. They get an error message for the incorrect field

## Unit test
- When you have the created_at and resolved_at the time between should be calculated correctly
- Try if the time is rounded to the nearest minute
  - :29 should be rounded down to the nearest minute
  - :30 should be rounded up to the nearest minute
  - :31 should be rounded up to the nearest minute

## System test
- Test if the error is added to the backlog.
  - When you submit the form the error is added to the backlog
  - When you submit invalid data the data is not added to the backlog

## Test result
// image

## Evaluation
### Possible mistake/error that can be detected
//

### Possible mistake/error that can not be detected by your test(s)
//

### Why everything works as expected
//

<br>                        
<br>                        
<br>

## Test plan B
- --
**<i>As an administrative assistant I want to check the order status so that I can check if the planning is intact.</i>**

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
