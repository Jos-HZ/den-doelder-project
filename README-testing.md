

# Testing - [Ivy Dekker](https://github.com/ivydk)
## Test plan A
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
When I run 
`php artisan test --filter BacklogTest` I get the following result: <br>
![backlog tests](https://github.com/Jos-HZ/den-doelder-project/blob/dff7135cbaaa6b006631abd2ccc58a18f71c17f1/public/img/testing-ivy/backlogTests.png)

## Evaluation
### Possible mistake/error that can be detected
With these tests you can detect the following mistakes:
- The time is not calculated correctly
- The time is not rounded to the nearest minute
- The error is not added to the backlog
- The error is added to the backlog when the data is invalid

### Possible mistake/error that can not be detected by your test(s)
With these tests you can not detect the following mistakes:
- The wrong order_id is added to the db
- The user filled in the form incorrectly (but the requirements are correct)

### Why everything works as expected
With these tests you can detect if the time is calculated correctly and if the time is rounded to the nearest minute. I made 4 tests for this. I chose two random times, to check if the time is calculated correctly. I also chose the edge cases to check if the minute are rounded correctly.
The feature test tests if the error is added to the backlog. I tested if the error is added to the backlog when the data is valid. I also tested if the error is not added to the backlog when the data is invalid.
The last test I made was to check if the backlog.index page is loaded correctly.

<br></br>
- --
## Test plan B
**<i>As an administrative assistant I want to check the order status so that I can check if the planning is intact.</i>**

### Acceptance criteria:
- There is an index page with all the current orders, per production line.
- The order status is displayed.
- Production worker needs to be able to set the order status (start, finished).

### Happy path
1. The administrative assistant is on the orders index page
2. They can click on a current order
3. They go to the current order show page
4. They can see the order status

### Unhappy path
1. The administrative assistant is on the orders index page
2. They can click on a current order
3. The order they clicked on is not in the system
4. They get redirected to a 404 page

## System test
- When a new order is added to the system, the order status is set to **pending** 
- When the order is started, the order status is set to **conversion** 
- When the production is started the status is set to **production**
- When the order is finished, the order status is set to **completed**
- When backlog is created error_status is set to TRUE

## Unit test
- conversion_time should be calculated correctly (time between conversion_time and start_time)
  - :29 should be rounded down to the nearest minute
  - :30 should be rounded up to the nearest minute
  - :31 should be rounded up to the nearest minute
- production_time should be calculated correctly (time between start_time and end_time)
    - :29 should be rounded down to the nearest minute
    - :30 should be rounded up to the nearest minute
    - :31 should be rounded up to the nearest minute

## Test result
When I run
`php artisan test --filter OrderTests` I get the following result: <br>
![order tests](https://github.com/Jos-HZ/den-doelder-project/blob/86a54df0279d60b03ef7a6c20143a1f38c755ddc/public/img/testing-ivy/orderTests.png)

## Evaluation
### Possible mistake/error that can be detected
With these tests you can detect the following mistakes:
- 

### Possible mistake/error that can not be detected by your test(s)
With these tests you can not detect the following mistakes:
- 

### Why everything works as expected
